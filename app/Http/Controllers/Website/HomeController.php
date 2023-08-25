<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ClientReview;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Management;
use App\Models\MissionVision;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['slider'] = Slider::latest()->get();
        $data['about'] = About::first();
        $data['categories'] = Category::inRandomOrder()->take(6)->get();
        $data['home_products'] = Product::latest()->take(8)->get();
        $data['brand'] = Brand::latest()->take(12)->get();
        $data['clients'] = ClientReview::latest()->get();
        $data['mission_vision'] = MissionVision::first();
        // $data['side_category'] = Category::where('parent_id', 0)->with('children')->orderBy('name', 'ASC')->get();
        return view('pages.web_index', $data);
    }

    public function about()
    {
        $about = About::first();
        $clients = ClientReview::latest()->get();
        return view('pages.about', compact('about', 'clients'));
    }

    public function management()
    {
        $management = Management::latest()->get();
        return view('pages.management', compact('management'));
    }

    public function gallery()
    {
        $gallery = Gallery::latest()->get();
        return view('pages.gallery_page', compact('gallery'));
    }

    public function products()
    {
        $products = Product::latest()->paginate(16);
        return view('pages.products', compact('products'));
    }

    public function productDetails($slug)
    {
        $product = Product::with('images')->where('slug', $slug)->first();
        $related_product = Product::where('id', '!=', $product->id)->where('category_id', $product->category_id)->take(4)->get();
        return view('pages.product_single', compact('product', 'related_product'));
    }

    public function productExport($id)
    {
        $products = Product::where('type', 'export')->where('category_id', $id)->latest()->paginate(16);
        return view('pages.products', compact('products'));
    }

    public function productImport($id)
    {
        $products = Product::where('category_id', $id)->where('type', 'import')->latest()->paginate(16);
        return view('pages.products', compact('products'));
    }

    public function productSuplier()
    {
        $products = Product::where('type', 'suplier')->latest()->paginate(16);
        return view('pages.products', compact('products'));
    }

    public function productCategory($id)
    {
        $products = Product::where('category_id', $id)->latest()->paginate(16);
        $category = Category::all();
        $slug = 'Category';
        return view('pages.products', compact('products', 'slug'));
    }

    public function productBrand($id)
    {
        $products = Product::where('brand_id', $id)->latest()->paginate(16);
        $category = Category::all();
        $slug = 'Brand';
        return view('pages.products', compact('products', 'slug'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        
        $products = Product::where("name", "LIKE", "%".$request->search."%")
                            ->orWhere("slug", "LIKE", "%".$request->search."%")
                            ->orWhere("price", "LIKE", "%".$request->search."%")
                            ->orWhere("description", "LIKE", "%".$request->search."%")
                            ->paginate(16);
        $slug = $request->search;
        return view('pages.products', compact('products', 'slug'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email|regex:/(.+)@(.+)\.(.+)/i',
            'phone' => 'required|unique:contacts,phone|regex:/(01)[0-9]{9}/|digits:11|max:15',
            'message' => 'required',
        ]);

        $data = Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return response()->json($data);
    }
}
