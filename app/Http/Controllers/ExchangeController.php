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
use App\Models\ExchangeModel;

use Auth;
use Telegram;
use Carbon\Carbon;
class ExchangeController extends Controller
{
    public function listexchange()
    {
        // $moneys = MoneyModel::all();
        $exchanges = ExchangeModel::orderBy('created_at', 'desc')->get();
        // dd(Auth::user()->name);
        return view('listexchange', compact('exchanges'));
    }

    public function addexchange()
    {
        $customers = CustomerModel::all();
        $couriers = CourierModel::all();
        $types = TypeModel::all();
        $servicetypes = ServiceTypeModel::all();
        return view('addexchange', ['customers'=>$customers, 'couriers'=>$couriers, 'types'=>$types, 'servicetypes'=>$servicetypes]);
    }

    public function saveexchange(Request $request)
    {
        $current = Carbon::now();
        $exchange = new ExchangeModel();

        $result = explode(" ", $request->customername, 3);

        $exchange->customer_id = $result[0];
        $exchange->customer_name = $result[1];

        if ($request->couriername == '')
        {
            $exchange->courier_id = 'В офисе';
        }
        else {
        $exchange->courier_id = $request->couriername;
        }
        $currencyy = CurrencyModel::find('1');
        // dd($currencyy->rub_usd);
         $rub_usd = floatval($currencyy->rub_usd);
         $rub_uzs = floatval($currencyy->rub_uzs);
         $uzs_usd = floatval($currencyy->uzs_usd);
        // dd($currencyy[0]->rub_usd);
        if ($request->type == 'USD->RUB')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount, 2));
            $exchange->rub = strval(round($amount*$rub_usd, 2));
            $exchange->uzs = strval(round($amount*$uzs_usd, 2));
        }
        elseif($request->type == 'USD->UZS')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount, 2));
            $exchange->rub = strval(round($amount*$rub_usd, 2));
            $exchange->uzs = strval(round($amount*$uzs_usd, 2));
        }
        elseif($request->type == 'RUB->USD')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount/$rub_usd, 2));
            $exchange->rub = strval(round($amount, 2));
            $exchange->uzs = strval(round($amount/$rub_uzs, 2));
            
        }
        elseif($request->type == 'RUB->UZS')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount/$rub_usd, 2));
            $exchange->rub = strval(round($amount, 2));
            $exchange->uzs = strval(round($amount/$rub_uzs, 2));
        }
        elseif($request->type == 'UZS->USD')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount/$uzs_usd, 2));
            $exchange->rub = strval(round($amount/$rub_uzs, 2));
            $exchange->uzs = strval(round($amount, 2));
        }
        elseif($request->type == 'UZS->RUB')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount/$uzs_usd, 2));
            $exchange->rub = strval(round($amount/$rub_uzs, 2));
            $exchange->uzs = strval(round($amount, 2));
        }

        $exchange->type = $request->type;

        if (Auth::user()->email == 'a.o.ashurov@gmail.com')
        {
        $exchange->branch = 'UZ';

        }
        else if (Auth::user()->email == 'alibay@gmail.com')
        {
        $exchange->branch = 'RU';
        }
        $exchange->description = $request->description . " Текуший курсы: " . " Рубль к доллару: ".$currencyy->rub_usd. " Рубль к суму: ".$currencyy->rub_uzs. " Сум к доллару: ".$currencyy->uzs_usd;
        $exchange->dategive = $current->format('d-m-y');
        $exchange->save();
 
        return back();

        
    }

    public function editexchange($id)
    {
        $exchanges = ExchangeModel::find($id);
        $couriers = CourierModel::all();
        $customers = CustomerModel::all();
        $types = TypeModel::all();
        // $servicetypes = ServiceTypeModel::all();

        return view('editexchange', ['exchanges'=>$exchanges,'customers'=>$customers, 'couriers'=>$couriers, 'types'=>$types]);

    }
    public function updateexchange(Request $request, $id)
    {
        $current = Carbon::now();
        $exchange = new ExchangeModel();

        $exchange->customer_id = $request->customer_id;
        $exchange->customer_name = $request->customername;
        if ($request->couriername == '')
        {
            $exchange->courier_id = 'В офисе';
        }
        else {
        $exchange->courier_id = $request->couriername;
        }
        $currencyy = CurrencyModel::find('1');
        // dd($currencyy->rub_usd);
         $rub_usd = floatval($currencyy->rub_usd);
         $rub_uzs = floatval($currencyy->rub_uzs);
         $uzs_usd = floatval($currencyy->uzs_usd);
        // dd($currencyy[0]->rub_usd);
        if ($request->type == 'USD->RUB')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount, 2));
            $exchange->rub = strval(round($amount*$rub_usd, 2));
            $exchange->uzs = strval(round($amount*$uzs_usd, 2));
        }
        elseif($request->type == 'USD->UZS')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount, 2));
            $exchange->rub = strval(round($amount*$rub_usd, 2));
            $exchange->uzs = strval(round($amount*$uzs_usd, 2));
        }
        elseif($request->type == 'RUB->USD')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount/$rub_usd, 2));
            $exchange->rub = strval(round($amount, 2));
            $exchange->uzs = strval(round($amount/$rub_uzs, 2));
            
        }
        elseif($request->type == 'RUB->UZS')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount/$rub_usd, 2));
            $exchange->rub = strval(round($amount, 2));
            $exchange->uzs = strval(round($amount/$rub_uzs, 2));
        }
        elseif($request->type == 'UZS->USD')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount/$uzs_usd, 2));
            $exchange->rub = strval(round($amount/$rub_uzs, 2));
            $exchange->uzs = strval(round($amount, 2));
        }
        elseif($request->type == 'UZS->RUB')
        {
            $amount = floatval($request->amount);
            $exchange->usd = strval(round($amount/$uzs_usd, 2));
            $exchange->rub = strval(round($amount/$rub_uzs, 2));
            $exchange->uzs = strval(round($amount, 2));
        }

        $exchange->type = $request->type;

        if (Auth::user()->email == 'a.o.ashurov@gmail.com')
        {
        $exchange->branch = 'UZ';

        }
        else if (Auth::user()->email == 'alibay@gmail.com')
        {
        $exchange->branch = 'RU';
        }
        $exchange->description = $request->description . " Текуший курсы: " . " Рубль к доллару: ".$currencyy->rub_usd. " Рубль к суму: ".$currencyy->rub_uzs. " Сум к доллару: ".$currencyy->uzs_usd;
        $exchange->dategive = $current->format('d-m-y');
        $exchange->save();
        $exchanges = ExchangeModel::orderBy('created_at', 'desc')->get();

        return view('listexchange', compact('exchanges'));
        // return back();

        
    }
    public function deleteexchange($id)
    {
        $exchange = ExchangeModel::where('id',$id)->delete();
        return redirect()->route('listexchange');
    }
}
