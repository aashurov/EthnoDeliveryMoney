<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourierModel;

class CourierController extends Controller
{
    public function listcourier()
    {
        $couriers = CourierModel::orderBy('created_at', 'desc')->get();
        return view('listcourier', ['couriers'=>$couriers]);
    }

    public function addcourier()
    {
        return view('addcourier');
        
    }

    public function savecourier(Request $request)
    {
        $couriers = new CourierModel();
        $couriers->flname = $request->couriername;
        $couriers->phone_number = $request->phonenumber;
        $couriers->save();
        $courierss = CourierModel::all();
        return view('listcourier', ['couriers'=>$courierss]);
    }

    public function editcourier($id)
    {
        $couriers = CourierModel::find($id);
        return view('editcourier', ['couriers'=>$couriers]);

        
    }
    public function updatecourier(Request $request, $id)
    {
        $couriers =  CourierModel::find($id);
        $couriers->flname = $request->couriername;
        $couriers->phone_number = $request->phonenumber;
        $couriers->save();

        $courier = CourierModel::orderBy('created_at', 'desc')->get();

        return view('listcourier', ['couriers'=>$courier]);

    }
    public function deletecourier($id)
    {
        $courier = CourierModel::where('id',$id)->delete();
        return redirect()->route('listcourier');
    }

}
