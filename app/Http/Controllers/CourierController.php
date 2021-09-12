<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourierController extends Controller
{
    public function addcourier()
    {

        return view('admin.courier.create');
    }
    public function storeCourier(Request $request)
    {

        $courier = new Courier();

        $courier->courier_name = $request->courier_name;

        $courier->created_by  = Auth::id();

        $courier->updated_by  = Auth::id();

        $courier->save();

        return redirect()->route('all.courier')->with('success', 'Courier add successsfully');
    }
    public function showCourier()
    {

        $courier = Courier::with('orders', 'createdBy', 'updatedBy')->paginate(2);

        return view('admin.courier.index', compact('courier'));
    }

    public function editCourier(Request $request, $id)
    {

        $editData = Courier::find($id);

        return view('admin.courier.edit', compact('editData'));
    }

    public function updateCourier(Request $request, $id)
    {

        $updateData = Courier::find($id);

        $updateData->courier_name = $request->courier_name;

        $updateData->updated_by = Auth::id();

        $updateData->save();

        return redirect()->route('all.courier')->with('success', 'Your data update successsfully');
    }
    public function deleteCourier(Request $request, $id)
    {

        Courier::find($id)->delete();

        return redirect()->route('all.courier')->with('success', 'Your data delete successfully');
    }
}
