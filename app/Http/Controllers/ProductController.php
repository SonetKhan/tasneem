<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function allProduct(Request $request)
    {

        $products = Product::latest()->paginate(4);

        return view('admin.product.index', ['products' => $products]);
    }
    public function resultData(Request $request)
    {
        $products = Product::select("*")

            ->when(!empty($request->input('product_name')), function ($query) use ($request) {
                $query->where('product_name', 'like', $request->product_name . '%');
            })
            ->when(!empty($request->input('product_price')), function ($query) use ($request) {
                $query->where('product_price', 'like', $request->product_price . '%');
            })
            ->when(!empty($request->input('show_in_home')), function ($query) use ($request) {
                $query->where('show_in_home', $request->show_in_home);
            })
            ->when(!empty($request->input('show_in_home_serial')), function ($query) use ($request) {
                $query->where('show_in_home_serial', $request->show_in_home_serial . '%');
            })
            ->when(!empty($request->input('special_price')), function ($query) use ($request) {
                $query->where('special_price', $request->special_price . '%');
            })
            ->when(!empty($request->input('special_price_start')), function ($query) use ($request) {
                $query->where('special_price_start', $request->special_price_start);
            })
            ->when(!empty($request->input('special_price_end')), function ($query) use ($request) {
                $query->where('special_price_end', $request->special_price_end);
            })->paginate(1);

        return view('admin.product.searchingData', compact('products'));
    }
    public function addProduct()
    {

        return view('admin.product.create');
    }

    public function storeProduct(Request $request)
    {


        $productImage = $request->file('product_picture');

        $specialPrice = $request->special_price;



        $specialPrice_start = $request->special_price_start;



        $specialPrice_end = $request->special_price_end;





        if ($productImage && $specialPrice && $specialPrice_start && $specialPrice_end) {





            $imageName = hexdec(uniqid()) . '.' . strtolower($productImage->getClientOriginalExtension());

            Image::make($productImage)->resize(100, 100)->save('image/product/' . $imageName);

            $uploadedImage = 'image/product/' . $imageName;

            $product = new Product();

            $product->category_id = $request->category_id;



            $product->product_name =  $request->product_name;

            $product->product_picture = $uploadedImage;


            $product->product_price = $request->product_price;

            $product->product_details = $request->product_details;

            $product->special_price = $request->special_price;

            $product->special_price_start = $request->special_price_start;

            $product->special_price_end = $request->special_price_end;

            $product->show_in_home = $request->show_in_home;

            $product->show_in_home_serial = $request->show_in_home_serial;

            $product->created_by  = Auth::id();

            $product->updated_by   = Auth::id();

            $product->save();

            return redirect()->route('all.product')->with('success', 'Product inserted successfully');
        } elseif ($productImage) {



            $imageName = hexdec(uniqid()) . '.' . strtolower($productImage->getClientOriginalExtension());

            Image::make($productImage)->resize(100, 100)->save('image/product/' . $imageName);

            $uploadedImage = 'image/product/' . $imageName;

            $product = new Product();

            $product->category_id = $request->category_id;

            $product->product_name =  $request->product_name;

            $product->product_picture = $uploadedImage;

            $product->product_price = $request->product_price;

            $product->product_details = $request->product_details;

            $product->show_in_home = $request->show_in_home;

            $product->show_in_home_serial = $request->show_in_home_serial;

            $product->created_by  = Auth::id();

            $product->updated_by   = Auth::id();

            $product->save();

            return redirect()->route('all.product')->with('success', 'Product inserted successfully');
        } elseif ($specialPrice) {



            $product = new Product();

            $product->category_id = $request->category_id;

            $product->product_name =  $request->product_name;;


            $product->product_price = $request->product_price;

            $product->product_details = $request->product_details;

            $product->show_in_home = $request->show_in_home;

            $product->show_in_home_serial = $request->show_in_home_serial;

            $product->created_by  = Auth::id();

            $product->updated_by   = Auth::id();

            $product->save();

            return redirect()->route('all.product')->with('success', 'Product inserted successfully');
        }
    }

    public function editProduct($id)
    {

        $product = Product::find($id);

        return view('admin.product.edit', compact('product'));
    }
    public function updateProduct(Request $request, $id)
    {


        $productImage = $request->file('product_picture');

        $specialPrice = $request->special_price;





        $specialPrice_start = $request->special_price_start;



        $specialPrice_end = $request->special_price_end;





        if ($productImage && $specialPrice && $specialPrice_start && $specialPrice_end) {





            $imageName = hexdec(uniqid()) . '.' . strtolower($productImage->getClientOriginalExtension());

            Image::make($productImage)->resize(100, 100)->save('image/product/' . $imageName);

            $uploadedImage = 'image/product/' . $imageName;

            $product = Product::find($id);

            $product->category_id = $request->category_id;



            $product->product_name =  $request->product_name;

            $product->product_picture = $uploadedImage;


            $product->product_price = $request->product_price;

            $product->product_details = $request->product_details;

            $product->special_price = $request->special_price;

            $product->special_price_start = $request->special_price_start;

            $product->special_price_end = $request->special_price_end;

            $product->show_in_home = $request->show_in_home;

            $product->show_in_home_serial = $request->show_in_home_serial;


            $product->updated_by   = Auth::id();

            $product->save();

            return redirect()->route('all.product')->with('success', 'Product updated successfully');
        } elseif ($productImage) {



            $imageName = hexdec(uniqid()) . '.' . strtolower($productImage->getClientOriginalExtension());

            Image::make($productImage)->resize(100, 100)->save('image/product/' . $imageName);

            $uploadedImage = 'image/product/' . $imageName;

            $product = Product::find($id);

            $product->category_id = $request->category_id;

            $product->product_name =  $request->product_name;

            $product->product_picture = $uploadedImage;

            $product->product_price = $request->product_price;

            $product->product_details = $request->product_details;

            $product->show_in_home = $request->show_in_home;

            $product->show_in_home_serial = $request->show_in_home_serial;


            $product->updated_by = Auth::id();

            $product->save();

            return redirect()->route('all.product')->with('success', 'Product updated successfully');
        } elseif ($specialPrice) {

            $validateData = $request->validate([

                'special_price_start' => 'required',

                'special_price_end' => 'required'

            ]);





            $product = Product::find($id);

            $product->category_id = $request->category_id;

            $product->product_name =  $request->product_name;;


            $product->product_price = $request->product_price;

            $product->product_details = $request->product_details;

            $product->show_in_home = $request->show_in_home;

            $product->special_price = $request->special_price;

            $product->special_price_start = $request->special_price_start;

            $product->special_price_end = $request->special_price_end;

            $product->show_in_home_serial = $request->show_in_home_serial;

            $product->updated_by = Auth::id();

            $product->save();

            return redirect()->route('all.product')->with('success', 'Product updated successfully');
        }
    }

    public function deleteProduct($id)
    {


        Product::find($id)->delete();

        return redirect()->route('all.product')->with('success', 'Product deleted successfully');
    }
}
