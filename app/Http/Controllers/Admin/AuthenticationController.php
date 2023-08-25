<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authCheck(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:1',
        ]);
        try {
            $Cradentials = $request->only('username', 'password');
            if(Auth::attempt($Cradentials)) {
                return redirect()->intended('/dashboard');
            }
            return redirect()->back()->withInput($request->only('username'))
            ->with('error', 'Username or Password was invalid.');
        } catch (\Exception $e) {
            return Redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout() 
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function registration()
    {
        $users = User::latest()->get();
        return view('auth.register', compact('users'));
    }

    public function newUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:1',
            'image' => 'mimes:jpg,png.jpeg,bmp'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->image = $this->imageUpload($request, 'image', 'uploads/user') ?? '';
        $user->save();
        if($user) {

            $notification=array(
                'message'=>'New User Created Successfully',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        }
        return redirect()->back()->withInput();
    }

    // password change
    public function passwordUpdate(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required',
        ]);
        $has_password = Auth::user()->password;
        if(Hash::check($request->old_password, $has_password))
        {
            if(!Hash::check($request->password, $has_password))
            {
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('login');
            }
            else
            {
                return redirect()->back()->withInput();
            }
        }
        else
        {
            return 'password dose not match';
        }
    }

    public function profile() 
    {
        return view('auth.profile');
    }

    public function profileUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required',
            'image' => 'mimes:jpg,png.jpeg,bmp'
        ]);

        $user = User::findOrFail(Auth::id());
        
        $profileImage = $user->image;
        if($request->hasFile('image')) {
            if(!empty($user->image) && file_exists($user->image)) 
                unlink($user->image);

            $profileImage = $this->imageUpload($request, 'image', 'uploads/user');
        } 

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->image = $profileImage;
        $user->save();
        if($user)
        {
            $notification=array(
                'message'=>'Profile Update Successfully',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        }
        return redirect()->back()->withInput();
    }
}
