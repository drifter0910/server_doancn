<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Checkout;
use Illuminate\Http\Request;


class CheckoutConrtoller extends Controller
{
    //
    private $status_code    =        200;
    public function checkout(Request $request)
    {
        $validator              =        Validator::make($request->all(), [
            "userid"              =>          "required",
            "username"              =>          "required",
            "email"             =>          "required",
            "phone"          =>          "required",
            "detail"          =>          "required",
            "totalprice"          =>          "required",
            "address"          =>          "required",


        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "messageRegister" => "validation_error", "errors" => $validator->errors()]);
        }
        $checkoutArray          =       array(
            "userid"             =>          $request->userid,
            "username"           =>          $request->username,
            "email"              =>          $request->email,
            "phone"              =>          $request->phone,
            "detail"             =>          $request->detail,
            "totalprice"         =>          $request->totalprice,
            "address"            =>          $request->address,
        );

        $checkout                   =           Checkout::create($checkoutArray);

        if (!is_null($checkout)) {
            return response()->json(["status" => $this->status_code, "success" => true, "messageCheckout" => "Checkout successfully", "data" => $checkout]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "messageCheckout" => "failed to checkout"]);
        }
    }
    // public function deletecheckout($id)
    // {
    //     $checkout = Checkout::findOrFail($id);
    //     if ($checkout)
    //         $checkout->delete();
    //     else
    //         return response()->json('error');
    //     return response()->json(null);
    // }
    public function deletecheckout($id)
    {
        $checkout = Checkout::findOrFail($id);
        if ($checkout) {
            $checkout->delete();
            return redirect('checkout')->with('message', 'Successful delete!');
        } else
            return response()->json('error');
        return response()->json(null);
    }
    function getorder($userid)
    {
        $order = Checkout::where([
            ['userid', '=', $userid],
        ])->get();

        return response()->json($order);
    }
}
