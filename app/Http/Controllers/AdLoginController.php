<?php

namespace App\Http\Controllers;
use App\Models\qtv;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdLoginController extends Controller
{
    //
    public function adminlogin(Request $request)
    {
       
        // $arr = [
        //     'email' => $request->email,
        //     'password' => $request->password
        // ];
        // if (Auth::attempt($arr)){
            
        //     return response([
        //         'message' => 'Login success!',
        //         'name' => $request->name,
        //         'email' => $request->email,
        //     ]);
        //     // ->redirect()->intended('dashboard');
        // }
        // else{
        //     return response('TK mk chua dung');
        // }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            
            return response([
                'message' => 'Login success!',
                'name' => $request->email,
                'email' => $request->password,
            ]);
            return redirect()->intended('dashboard');
        }
        else{
            return response('K dc');
        }
    }

    public function registeradmin(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
 
        $user = qtv::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('message', 'Your account is created');
       
        // return redirect()->route('adminlogin');
    }
}
