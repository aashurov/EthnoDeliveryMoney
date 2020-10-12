<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;

class CustomerController extends Controller
{
    public function listcustomer()
    {
        $customers = CustomerModel::all();
        return view('listcustomer', ['customers'=>$customers]);
    }

    public function addcustomer()
    {
        return view('addcustomer');
        
    }

    public function savecustomer(Request $request)
    {
        $customers = new CustomerModel();
        $customers->c_id = $request->customernumber;
        $customers->flname = $request->customername;
        $customers->phone_number = $request->phonenumber;
        $customers->save();
        $customerss = CustomerModel::all();
        return view('listcustomer', ['customers'=>$customerss]);
    }

    public function editcustomer($id)
    {
        $customers = CustomerModel::find($id);
        return view('editcustomer', ['customers'=>$customers]);

        
    }
    public function updatecustomer(Request $request, $id)
    {
        $customers =  CustomerModel::find($id);
        $customers->c_id = $request->customernumber;

        $customers->flname = $request->customername;
        $customers->phone_number = $request->phonenumber;
        $customers->save();

        $customer = CustomerModel::all();

        return view('listcustomer', ['customers'=>$customer]);

    }
    public function deletecustomer($id)
    {
        $customer = CustomerModel::where('id',$id)->delete();
        return redirect()->route('listcustomer');
    }

}
