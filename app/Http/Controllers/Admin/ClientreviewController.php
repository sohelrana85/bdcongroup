<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClientReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientreviewController extends Controller
{
    public function index()
    {
        $client = ClientReview::latest()->get();
        return view('admin.client', compact('client'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'designation' => 'required|max:100',
            'description' => 'required',
            'image' => 'required|Image|mimes:jpg,png,gif,webp'
        ]);

        try {
            $client = new ClientReview();
            $client->name = $request->name;
            $client->designation = $request->designation;
            $client->description = $request->description;
            $client->image = $this->imageUpload($request, 'image', 'uploads/clients');
            $client->ip_address = $request->ip();
            $client->created_by = Auth::id();
            $client->save();

            $notification=array(
                'message'=>'Data Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            // $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $clientData = ClientReview::find($id);
        $client = ClientReview::latest()->get();
        return view('admin.client', compact('clientData', 'client'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'designation' => 'required|max:100',
            'description' => 'required',
            'image' => 'Image|mimes:jpg,png,gif,webp'
        ]);

        try {
            $client = ClientReview::find($id);
            $clImg = $client->image;
            if ($request->hasFile('image')) {
                if (!empty($client->image) && file_exists($client->image)) {
                    unlink($client->image);
                    $clImg = $this->imageUpload($request, 'image', 'uploads/clients');
                }
            }
            $client->name = $request->name;
            $client->designation = $request->designation;
            $client->description = $request->description;
            $client->image = $clImg;
            $client->ip_address = $request->ip();
            $client->updated_by = Auth::id();
            $client->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('clients.index')->with($notification);

        } catch (\Exception $e) {
            // $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $client = ClientReview::find($request->id);
            if($client){
                if(file_exists($client->image) AND !empty($client->image)){
                    unlink($client->image);
                }
                $client->delete();
            }

            return response()->json([
                'message'=>'Data Deleted Successfully',
                'success'=> true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Something went wrong!',
                'success'=> false
            ]);
        } 
    }
}
