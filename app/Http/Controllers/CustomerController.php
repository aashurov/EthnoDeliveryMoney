<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\MoneyModel;


class CustomerController extends Controller
{
    public function listcustomer()
    {
        $customers = CustomerModel::orderBy('created_at', 'desc')->get();
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
        $customers->passportnumber = $request->passportnumber;
        $customers->addressmain = $request->addressmain;
        $customers->addresssecond = $request->addresssecond;
        $customers->dategive = $request->dategive;
        $customers->expirationdate = $request->expirationdate;
        $customers->issuedby = $request->issuedby;


        if($request->file('imageavatar') != null)
        {
            $image1 = $request->file('imageavatar');
            $imageName1 = '1'.time().'.'.$image1->extension();
            $image1->move(public_path('image'), $imageName1);
            $customers->imageavatar = $imageName1;
        }
        else
        {
            $customers->imageavatar = 'avatar.png';
        }
       
        if($request->file('imagepassport') != null)
        {
            $image2 = $request->file('imagepassport');
            $imageName2 = '2'.time().'.'.$image2->extension();
            $image2->move(public_path('image'), $imageName2);
            $customers->imagepassport = $imageName2;
        }
        else
        {
            $customers->imagepassport = 'imagepassport.png';
        }

        if($request->file('imagepassportt') != null)
        {
            $image3 = $request->file('imagepassportt');
            $imageName3 = '3'.time().'.'.$image3->extension();
            $image3->move(public_path('image'), $imageName3);
            $customers->imagepassportt = $imageName3;
        }
        else
        {
            $customers->imagepassportt = 'imagepassportt';
        }
        
       

        $customers->save();
        $customerss = CustomerModel::orderBy('created_at', 'desc')->get();
        return view('listcustomer', ['customers'=>$customerss]);
    }

    public function editcustomer($id)
    {
        $customers = CustomerModel::find($id);
        $forcustomers = MoneyModel::where('customer_id', $customers->c_id)->orderBy('created_at', 'desc')->get();
        return view('editcustomer', ['customers'=>$customers, 'forcustomers'=>$forcustomers]);

        
    }
    public function updatecustomer(Request $request, $id)
    {
        $customers =  CustomerModel::find($id);
        $customers->c_id = $request->customernumber;
        $customers->flname = $request->customername;
        $customers->phone_number = $request->phonenumber;
        $customers->passportnumber = $request->passportnumber;
        $customers->addressmain = $request->addressmain;
        $customers->addresssecond = $request->addresssecond;
        $customers->dategive = $request->dategive;
        $customers->expirationdate = $request->expirationdate;
        $customers->issuedby = $request->issuedby;


       
        if($request->file('imageavatar') != null)
        {
            $image1 = $request->file('imageavatar');
            $imageName1 = '1'.time().'.'.$image1->extension();
            $image1->move(public_path('image'), $imageName1);
            $customers->imageavatar = $imageName1;
        }
        else
        {
            $customers->imageavatar = 'avatar.png';
        }
       
        if($request->file('imagepassport') != null)
        {
            $image2 = $request->file('imagepassport');
            $imageName2 = '2'.time().'.'.$image2->extension();
            $image2->move(public_path('image'), $imageName2);
            $customers->imagepassport = $imageName2;
        }
        else
        {
            $customers->imagepassport = 'imagepassport.png';
        }

        if($request->file('imagepassportt') != null)
        {
            $image3 = $request->file('imagepassportt');
            $imageName3 = '3'.time().'.'.$image3->extension();
            $image3->move(public_path('image'), $imageName3);
            $customers->imagepassportt = $imageName3;
        }
        else
        {
            $customers->imagepassportt = 'imagepassportt.png';
        }
        

        $customers->save();

        $customer = CustomerModel::orderBy('created_at', 'desc')->get();

        return view('listcustomer', ['customers'=>$customer]);

    }
    public function deletecustomer($id)
    {
        $customer = CustomerModel::where('id',$id)->delete();
        return redirect()->route('listcustomer');
    }

}
