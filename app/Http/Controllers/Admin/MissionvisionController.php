<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MissionVision;
use Illuminate\Http\Request;

class MissionvisionController extends Controller
{
    public function index()
    {
        $mission_vision = MissionVision::first();
        return view('admin.mission_vision', compact('mission_vision'));
    }

    public function update(Request $request, $id)
    {
        try {
            $mission_vision = MissionVision::find($id);
            $mission_vision->mission_desc = $request->mission_desc;
            $mission_vision->vision_desc = $request->vision_desc;
            $mission_vision->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            return $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}