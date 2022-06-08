<?php

namespace App\Http\Controllers;

use App\Models\NewFeeds;
use Illuminate\Http\Request;

class NewFeedsController extends Controller
{
    function addnewfeed(Request $req)
    {
        $product = new NewFeeds();
        $product->name = $req->name;
        $product->description = $req->description;

        $getimg3 = '';
        if ($req->hasFile('img3')) {
            //Hàm kiểm tra dữ liệu
            $this->validate(
                $req,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'img3' => 'mimes:jpg,jpeg,png,gif',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'img3.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',

                ]
            );
        }
        //Lưu hình ảnh vào thư mục public/upload/hinhthe
        $hinhthe3 = $req->file('img3');
        $getimg3 = time() . '_' . $hinhthe3->getClientOriginalName();
        $destinationPath3 = public_path('upload/product');
        $hinhthe3->move($destinationPath3, $getimg3);
        $product->image = $getimg3;
        $product->save();
        // return redirect('/')->with('success', 'Your message has been 
        //     successfully sent. We will reach out to you soon');
        return redirect()->route('addnewfeed')->with('message', 'Create newfeed success!');
    }
    function getnewfeed(Request $req)
    {
        return NewFeeds::all();
        return response()->json($req);
    }
}
