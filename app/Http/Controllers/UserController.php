<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helper\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    function getuser()
    {
        return User::all();
    }

    private $status_code    =        200;
    public function userSignUp(Request $request)
    {
        $validator              =        Validator::make($request->all(), [
            "name"              =>          "required",
            "email"             =>          "required|email",
            "address"          =>          "required",
            "phone"          =>          "required",
            "password"          =>          "required",


        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "messageRegister" => "validation_error", "errors" => $validator->errors()]);
        }
        $userDataArray          =       array(
            "name"               =>          $request->name,
            "email"              =>          $request->email,
            "address"            =>          $request->address,
            "address"            =>          $request->phone,

            "password"           =>          Hash::make($request->password),
        );

        $user_status            =           User::where("email", $request->email)->first();

        if (!is_null($user_status)) {
            return response()->json(["status" => "failed", "success" => false, "messageRegister" => "Whoops! email already registered"]);
        }

        $user                   =           User::create($userDataArray);

        if (!is_null($user)) {
            return response()->json(["status" => $this->status_code, "success" => true, "messageRegister" => "Registration completed successfully", "data" => $user]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "messageRegister" => "failed to register"]);
        }
    }



    public function userLogin(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid Email or password'
            ]);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, minutes: 60 * 24);
        // return $token;
        return response([
            'message' => 'Login success!',
            'id' => $user->id,
            'name' => $user->name,
            'email' => $request->email,
            'address' => $user->address,
            'phone' => $user->phone,




        ])->withCookie($cookie);
    }
    public function adminLogin(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid Email or password'
            ]);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, minutes: 60 * 24);
        // return $token;
        return view('dashboard', compact([
            'name' => $user->name
        ]));
    }



    public function user()
    {
        return Auth::user();
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'Logout Success'
        ])->withCookie($cookie);
    }
    public function updateUser(Request $request, $id)
    {
        $product = User::find($id);
        // $product->update($request->all());

        $userDataArray          =       array(
            "name"               =>          $request->name,
            "password"           =>          Hash::make($request->password),
            "address"            =>          $request->address,
            "phone"            =>          $request->phone,


        );
        $product->update($userDataArray);
        return response()->json($product);
    }
}
