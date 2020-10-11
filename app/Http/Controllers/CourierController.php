<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourierModel;

class CourierController extends Controller
{
    public function listcourier()
    {
        $couriers = courierModel::all();
        return view('listcourier', ['couriers'=>$couriers]);
    }

    public function addcourier()
    {
        return view('addcourier');
        
    }

    public function savecourier(Request $request)
    {
        $couriers = new courierModel();
        $couriers->flname = $request->couriername;
        $couriers->phone_number = $request->phonenumber;
        $couriers->save();
        $courierss = courierModel::all();
        return view('listcourier', ['couriers'=>$courierss]);
    }

    public function editcourier($id)
    {
        $couriers = courierModel::find($id);
        return view('editcourier', ['couriers'=>$couriers]);

        
    }
    public function updatecourier(Request $request, $id)
    {
        $couriers =  courierModel::find($id);
        $couriers->flname = $request->couriername;
        $couriers->phone_number = $request->phonenumber;
        $couriers->save();

        $courier = courierModel::all();

        return view('listcourier', ['couriers'=>$courier]);

    }
    public function deletecourier($id)
    {
        $courier = courierModel::where('id',$id)->delete();
        return redirect()->route('listcourier');
    }

}
