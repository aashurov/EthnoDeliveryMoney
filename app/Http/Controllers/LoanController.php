<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\MoneyDataTables;
use App\Models\MoneyModel;
use App\Models\CustomerModel;
use App\Models\CourierModel;
use App\Models\TypeModel;
use App\Models\ServiceTypeModel;
use App\Models\CurrencyModel;
use App\Models\LoanModel;
 use Auth;
use Telegram;
use Carbon\Carbon;

class LoanController extends Controller
{
    
    public function listloan()
    {
        $loans = LoanModel::orderBy('created_at', 'desc')->get();
        return view('listloan', compact('loans'));
    }

    public function addloan()
    {
        $customers = CustomerModel::all();
        $couriers = CourierModel::all();
        $types = TypeModel::all();
        return view('addloan', ['customers'=>$customers, 'couriers'=>$couriers, 'types'=>$types]);
    }

    public function saveloan(Request $request)
    {
        $current = Carbon::now();
        $loan = new LoanModel();

        $result = explode(" ", $request->customername, 3);

        $loan->customer_id = $result[0];
        $loan->customer_name = $result[1];

        if ($request->couriername == '')
        {
            $loan->courier_id = 'В офисе';
        }
        else {
        $loan->courier_id = $request->couriername;
        }
        $currencyy = CurrencyModel::all()->last();
         $rub_usd = floatval($currencyy->rub_usd);
         $rub_uzs = floatval($currencyy->rub_uzs);
         $uzs_usd = floatval($currencyy->uzs_usd);
        if ($request->type == 'USD')
        {
            $amount = floatval($request->amount);
            $loan->usd = strval(round($amount, 2));
            $loan->rub = strval(round($amount*$rub_usd, 2));
            $loan->uzs = strval(round($amount*$uzs_usd, 2));
        }
        elseif($request->type == 'RUB')
        {
            $amount = floatval($request->amount);
            $loan->usd = strval(round($amount/$rub_usd, 2));
            $loan->rub = strval(round($amount, 2));
            $loan->uzs = strval(round($amount/$rub_uzs, 2));
        }
        elseif($request->type == 'UZS')
        {
            $amount = floatval($request->amount);
            $loan->usd = strval(round($amount/$uzs_usd, 2));
            $loan->rub = strval(round($amount/$rub_uzs, 2));
            $loan->uzs = strval(round($amount, 2));
            
        }
        $loan->type = $request->type;
        if (Auth::user()->email == 'a.o.ashurov@gmail.com')
        {
        $loan->branch = 'UZ';

        }
        else if (Auth::user()->email == 'alibay@gmail.com')
        {
        $loan->branch = 'RU';
        }
        $loan->description = $request->description . " Текуший курсы: " . " Рубль к доллару: ".$currencyy->rub_usd. " Рубль к суму: ".$currencyy->rub_uzs. " Сум к доллару: ".$currencyy->uzs_usd;
        $loan->dategive = $current->format('d-m-y');
        $loan->dateclose = '00000';

        $loan->status = $request->status;
        $loan->save();
        return back();

    }

    public function deleteloan($id)
    {
        $loan = LoanModel::where('id',$id)->delete();
        return redirect()->route('listloan');
    }
    public function closeloan($id)
    {
        $current = Carbon::now();
        $loan = LoanModel::find($id);
        if ($loan->status == 'Отдал')
        {
            $loan->status='Взял';
            $loan->dateclose = $current->format('d-m-y');
        }
        else if ($loan->status == 'Взял')
        {
            $loan->status='Отдал';
            $loan->dateclose = $current->format('d-m-y');
        }
        $loan->save();
        return redirect()->route('listloan');
    }

    public function editloan($id)
    {
        $loans = LoanModel::find($id);
        $couriers = CourierModel::all();
        $customers = CustomerModel::all();
        $types = TypeModel::all();
        $servicetypes = ServiceTypeModel::all();

        return view('editloan', ['loans'=>$loans,'customers'=>$customers, 'couriers'=>$couriers, 'types'=>$types, 'servicetypes'=>$servicetypes]);
    }

    public function updateloan(Request $request, $id)
    {
        $current = Carbon::now();
        $loan =  LoanModel::find($id);
        // dd($money);
        $loan->customer_id = $request->customer_id;
        $loan->customer_name = $request->customername;

         if ($request->couriername == '')
        {
            $loan->courier_id = 'В офисе';
        }
        else {
        $loan->courier_id = $request->couriername;
        }
        $currencyy = CurrencyModel::all()->last();
         $rub_usd = floatval($currencyy->rub_usd);
         $rub_uzs = floatval($currencyy->rub_uzs);
         $uzs_usd = floatval($currencyy->uzs_usd);

        if ($request->type == 'USD')
        {
            $amount = floatval($request->amount);
            $loan->usd = strval(round($amount, 2));
            $loan->rub = strval(round($amount*$rub_usd, 2));
            $loan->uzs = strval(round($amount*$uzs_usd, 2));
        }
        elseif($request->type == 'RUB')
        {
            $amount = floatval($request->amount);
            $loan->usd = strval(round($amount/$rub_usd, 2));
            $loan->rub = strval(round($amount, 2));
            $loan->uzs = strval(round($amount/$rub_uzs, 2));
        }
        elseif($request->type == 'UZS')
        {
            $amount = floatval($request->amount);
            $loan->usd = strval(round($amount/$uzs_usd, 2));
            $loan->rub = strval(round($amount/$rub_uzs, 2));
            $loan->uzs = strval(round($amount, 2));
            
        }

        $loan->type = $request->type;
        if (Auth::user()->email == 'a.o.ashurov@gmail.com')
        {
        $loan->branch = 'UZ';

        }
        else if (Auth::user()->email == 'alibay@gmail.com')
        {
        $loan->branch = 'RU';
        }
        // $loan->servicetype = $request->servicetype;
        $loan->description = $request->description . " Текуший курсы: " . " Рубль к доллару: ".$currencyy->rub_usd. " Рубль к суму: ".$currencyy->rub_uzs. " Сум к доллару: ".$currencyy->uzs_usd;
        $loan->dategive = $current->format('d-m-y');
        $loan->dateclose = $current->format('d-m-y');
        $loan->status = $request->status;

        // $loan->datereceive = $current->format('d-m-y');
        // dd($request->all());
        $loan->save();
        // $money->where('id', $id)->update($request->all());
    //    return view('listmoney');
        $loans = LoanModel::orderBy('created_at', 'desc')->get();

       return view('listloan', compact('loans'));

    }
}
