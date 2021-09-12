<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    public function searchOrder(Request $request)
    {

        $orders = Order::select("*")

            ->when(!empty($request->input('name')), function ($query) use ($request) {
                $query->where('name', 'like', $request->name . '%');
            })
            ->when(!empty($request->input('shipping_address')), function ($query) use ($request) {
                $query->where('shipping_address', 'like', $request->shipping_address . '%');
            })
            ->when(!empty($request->input('mobile')), function ($query) use ($request) {
                $query->where('mobile', 'like', $request->mobile);
            })
            ->when(!empty($request->input('alternative_mobile')), function ($query) use ($request) {
                $query->where('alternative_mobile', 'like', $request->alternative_mobile . '%');
            })
            ->when(!empty($request->input('total_product')), function ($query) use ($request) {
                $query->where('total_product', 'like', $request->total_product . '%');
            })
            ->when(!empty($request->input('total_price')), function ($query) use ($request) {
                $query->where('total_price', 'like', $request->total_price);
            })
            ->when(!empty($request->input('discount')), function ($query) use ($request) {
                $query->where('discount', 'like', $request->discount);
            })
            ->when(!empty($request->input('paid')), function ($query) use ($request) {
                $query->where('paid', $request->paid);
            })
            ->when(!empty($request->input('status')), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when(!empty($request->input('payment_status')), function ($query) use ($request) {
                $query->where('payment_status', $request->payment_status);
            })
            ->when(!empty($request->input('payment_details')), function ($query) use ($request) {
                $query->where('payment_details', 'like', $request->payment_details);
            })
            ->when(!empty($request->input('courier_id')), function ($query) use ($request) {
                $query->where('courier_id', 'like', $request->courier_id);
            })
            ->when(!empty($request->input('courier_details')), function ($query) use ($request) {
                $query->where('courier_details', 'like', $request->courier_details);
            })
            ->when(!empty($request->input('special_instruction')), function ($query) use ($request) {
                $query->where('special_instruction', 'like', $request->special_instruction);
            })
            ->when(!empty($request->input('comment')), function ($query) use ($request) {
                $query->where('comment', 'like', $request->comment);
            })->paginate(1);

        return view('admin.order.searchData', compact('orders'));
    }
    public function showOrder()
    {
        $orders = Order::latest()->paginate(2);

        return view('admin.order.index', compact('orders'));
    }
    public function addOrder()
    {

        return view('admin.order.create');
    }
    public function productName(Request $request)
    {

        $id = $request->id;

        $productData = array();

        $catData = Category::find($id)->products;

        foreach ($catData as $data) {

            $productData[] = $data;
        }

        return $productData;
    }

    public function setPrice(Request $request)
    {
        $id = $request->id;

        $productData = Product::find($id);

        // $productData = Category::find($id)->products;


        return response()->json($productData);
    }

    public function confirmOder(Request $request)
    {

        $order = new Order();

        $order->name = $request->name;

        $address = $request->shipping_address;

        $postingAdress = '';

        foreach ($address as $key => $value) {
            $postingAdress .= $key . ':' . $value . ',';

            // $postingAdress = rtrim($postingAdress, ',');
        }
        $postingAdress = rtrim($postingAdress, ',');

        $order->shipping_address = $postingAdress;

        $order->mobile = $request->mobile;

        $order->alternative_mobile = $request->alternative_mobile;

        $order->total_product = $request->product_quantity;

        $order->total_price = $request->total_amount;

        $order->discount = $request->discount;

        $order->paid = $request->paid;

        $order->payment_details = $request->payment_details;

        $order->comment = $request->comment;

        $order->updated_by = Auth::id();

        $result = $order->save();

        $productData = json_decode($request->jsonProduct);

        foreach ($productData as $data) {

            $order_product = new OrderProduct();

            $proudct = Product::find($data->product_id);

            $productPrice = $proudct->product_price;

            $productQty = $data->qty;

            $order = DB::table('orders')->orderBy('created_at', 'desc')->first();

            $orderId = $order->id;

            $totalPrice = $productPrice * $productQty;

            $order_product->order_id = $orderId;

            $order_product->product_id = $data->product_id;

            $order_product->quantity = $productQty;

            $order_product->rate = $productPrice;

            $order_product->total = $totalPrice;

            $order_product->save();
        }

        if ($result) {

            return response()->json($result);
        } else {

            return "Order has not completed";
        }
    }
    public function processOrder(Request $request, $id)
    {
        $process = Order::find($id);

        return view('admin.order.process', compact('process'));
    }
    public function updateProcess(Request $request, $id)
    {
        

        $order = Order::find($id);

        $order->total_price = $request->total_price;

        $order->discount = $request->discount;

        $order->paid = $request->paid;

        $order->status = $request->status;

        $order->payment_status = $request->payment_status;

        $order->courier_id = $request->courier_id;

        $order->courier_details = $request->courier_details;

        $order->special_instruction = $request->special_instruction;

        $order->save();

        return redirect()->route('all.orders')->with('success', 'Process updated successfully!!');
    }
    public function editOrder(Request $request, $id)
    {
        $editData = Order::find($id);

        return view('admin.order.edit', compact('editData'));
    }

    public function updateOrder(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',

            'mobile' => 'required',

            'shipping_address' => "required"


        ]);

        $updateData = Order::find($id);

        $updateData->name = $request->name;

        $updateData->shipping_address = $request->shipping_address;

        $updateData->mobile = $request->mobile;

        $updateData->alternative_mobile = $request->alternative_mobile;

        $updateData->total_product = $request->total_product;

        $updateData->total_price = $request->total_price;

        $updateData->discount = $request->discount;

        $updateData->paid = $request->paid;

        $updateData->status = $request->status;

        $updateData->payment_status = $request->payment_status;

        $updateData->payment_details = $request->payment_details;

        $updateData->courier_id = $request->courier_id;

        $updateData->courier_details = $request->courier_details;

        $updateData->special_instruction = $request->special_instruction;

        $updateData->comment = $request->comment;

        $updateData->updated_by = Auth::id();

        $updateData->save();

        return redirect()->route('all.orders')->with('success', 'You updated data successfully');
    }

    public function deleteOrder($id)
    {
        Order::find($id)->delete();

        return redirect()->route('all.orders')->with('success', 'You deleted data successfully');
    }
}
