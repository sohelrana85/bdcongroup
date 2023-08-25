<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required',
            'image' => 'Image|mimes:jpg,jpeg,png,gif|max:255',
        ]);
        try {
            $about = About::find($id);

            //logo image 
            $aboutImg = $about->image;
            $singImg = $about->signature;
            if ($request->hasFile('image')) {
                if (!empty($about->image) && file_exists($about->image)) 
                    unlink($about->image);
                $aboutImg = $this->imageUpload($request, 'image', 'uploads/about');
            }

            if ($request->hasFile('signature')) {
                if (!empty($about->signature) && file_exists($about->signature)) 
                    unlink($about->signature);
                $singImg = $this->imageUpload($request, 'signature', 'uploads/about');
            }

            $about->title = $request->title;
            $about->name = $request->name;
            $about->designation = $request->designation;
            $about->description = $request->description;
            $about->signature = $singImg;
            $about->image = $aboutImg;
            $about->updated_by = Auth::id();
            $about->ip_address = $request->ip();
            $about->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
