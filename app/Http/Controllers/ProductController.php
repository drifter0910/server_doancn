<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Category;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function addproduct(Request $req)
    {
        $product = new Product;
        $product->id = $req->id;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->newprice = $req->newprice;
        $product->discount = $req->discount;
        $product->description = $req->description;
        $product->category = $req->category;

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
        return redirect()->route('addproduct')->with('message', 'Da them san pham');
    }

    function addbanner(Request $req)
    {
        $banner = new banner();
        $banner->name = $req->name;
        $banner->description = $req->description;

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
        $destinationPath3 = public_path('upload/banner');
        $hinhthe3->move($destinationPath3, $getimg3);
        $banner->image = $getimg3;
        $banner->save();
        // return redirect('/')->with('success', 'Your message has been 
        //     successfully sent. We will reach out to you soon');
        return redirect()->route('addbanner')->with('success', 'Da them san pham');
    }

    function getBanner(Request $req)
    {

        return banner::all();
        return response()->json($req);
    }
    function getProduct(Request $req)
    {

        return Product::all();
        return response()->json($req);
    }
    function getCategory(Request $req)
    {

        return Category::all();
        return response()->json($req);
    }

    function getProductById($id)
    {
        $product = Product::find($id);

        return response()->json($product);
    }


    function getProductByCategory($id, Request $category)
    {
        $products = Product::find($id)->products;
        return $products;
    }
    public function deleteproduct($id)
    {
        $checkout = Product::findOrFail($id);
        if ($checkout) {
            $checkout->delete();
            return redirect('allproduct')->with('message', 'Successful delete!');
        } else
            return response()->json('error');
        return response()->json(null);
    }
}
