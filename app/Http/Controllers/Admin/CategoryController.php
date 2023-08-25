<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['parent' => function($q) {
            $q->select('id', 'name');
        }])->get();
        return view('admin.category', compact('categories'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'image' => 'Image|mimes:jpg,png,gif,webp'
        ]);
        
        try {
            $category = new Category();
            $category->parent_id = $request->parent_id ?? 0;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->image = $this->imageUpload($request, 'image', 'uploads/category');
            $category->created_by = Auth::id();
            $category->ip_address = $request->ip();
            $category->save();

            $notification = array(
                'message'=>'Category Created!',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $action = route('category.update', $category->id);

        return response()->json([
            'category'      => $category,
            'action'    => $action,
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'image' => 'Image|mimes:jpg,png,gif,webp'
        ]);
        
        try {
            $category = Category::find($id);
            //category image update
            $categoryImg = $category->image;
            if ($request->hasFile('image')) {
                if (!empty($category->image) && file_exists($category->image)) 
                    unlink($category->image);
                $categoryImg = $this->imageUpload($request, 'image', 'uploads/category');
            }

            $category->parent_id = $request->parent_id ?? 0;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->image = $categoryImg;
            $category->ip_address = $request->ip();
            $category->save();

            $notification = array(
                'message'=>'Category Updated!',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            if ($category->products->count() > 0) {
                $notification = array(
                    'message'=>'At first delete this categories product!',
                    'alert-type'=>'error'
                );
            } else {
                if(file_exists($category->image) && !empty($category->image)) {
                    unlink($category->image);
                }
                $category->delete();
    
                $notification = array(
                    'message'=>'Category Delete!',
                    'alert-type'=>'success'
                );
            }
            return back()->with($notification);
            
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
