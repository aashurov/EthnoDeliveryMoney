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

use Carbon\Carbon;
class MoneyController extends Controller
{
    public function listmoney(MoneyDataTables $dataTables)
    {
        // $moneys = MoneyModel::all();
        $moneys = MoneyModel::paginate(10);

        return view('listmoney', compact('moneys'));
    }

    public function addmoney()
    {
        $customers = CustomerModel::all();
        $couriers = CourierModel::all();
        $types = TypeModel::all();
        $servicetypes = ServiceTypeModel::all();
        return view('addmoney', ['customers'=>$customers, 'couriers'=>$couriers, 'types'=>$types, 'servicetypes'=>$servicetypes]);
    }

    public function savemoney(Request $request)
    {
        $current = Carbon::now();
        $money = new MoneyModel();
        $money->customer_id = $request->customername;
        $money->courier_id = $request->customername;
        $currencyy = CurrencyModel::get();
         $rub_usd = floatval($currencyy[0]->rub_usd);
         $rub_uzs = floatval($currencyy[0]->rub_uzs);
         $uzs_usd = floatval($currencyy[0]->uzs_usd);
        // dd($currencyy[0]->rub_usd);
        if ($request->type == 'USD')
        {
            $amount = floatval($request->amount);
            $money->usd = strval(round($amount, 2));
            $money->rub = strval(round($amount*$rub_usd, 2));
            $money->uzs = strval(round($amount*$uzs_usd, 2));
        }
        elseif($request->type == 'RUB')
        {
            $amount = floatval($request->amount);
            $money->usd = strval(round($amount/$rub_usd, 2));
            $money->rub = strval(round($amount, 2));
            $money->uzs = strval(round($amount/$rub_uzs, 2));
        }
        elseif($request->type == 'UZS')
        {
            $amount = floatval($request->amount);
            $money->usd = strval(round($amount/$uzs_usd, 2));
            $money->rub = strval(round($amount/$rub_uzs, 2));
            $money->uzs = strval(round($amount, 2));
            
        }
        $money->type = $request->type;
        $money->servicetype = $request->servicetype;
        $money->description = $request->description . " Текуший курсы: " . " Рубль к доллару: ".$currencyy[0]->rub_usd. " Рубль к суму: ".$currencyy[0]->rub_uzs. " Сум к доллару: ".$currencyy[0]->uzs_usd;
        $money->dategive = $current->format('d-m-y');
        $money->status = 'Received';
        $money->datereceive = $current->format('d-m-y');
        $money->save();
        return back();
    }

    public function editmoney($id)
    {
        $moneys = MoneyModel::find($id);
        $couriers = CourierModel::all();
        $customers = CustomerModel::all();
        $types = TypeModel::all();
        $servicetypes = ServiceTypeModel::all();

        return view('editmoney', ['moneys'=>$moneys,'customers'=>$customers, 'couriers'=>$couriers, 'types'=>$types, 'servicetypes'=>$servicetypes]);
    }
    public function updatemoney(Request $request, $id)
    {
        $current = Carbon::now();
        $money =  MoneyModel::find($id);
        // dd($money);
        $money->customer_id = $request->customername;
        $money->courier_id = $request->customername;
        $currencyy = CurrencyModel::get();
         $rub_usd = floatval($currencyy[0]->rub_usd);
         $rub_uzs = floatval($currencyy[0]->rub_uzs);
         $uzs_usd = floatval($currencyy[0]->uzs_usd);

        if ($request->type == 'USD')
        {
            $amount = floatval($request->amount);
            $money->usd = strval(round($amount, 2));
            $money->rub = strval(round($amount*$rub_usd, 2));
            $money->uzs = strval(round($amount*$uzs_usd, 2));
        }
        elseif($request->type == 'RUB')
        {
            $amount = floatval($request->amount);
            $money->usd = strval(round($amount/$rub_usd, 2));
            $money->rub = strval(round($amount, 2));
            $money->uzs = strval(round($amount/$rub_uzs, 2));
        }
        elseif($request->type == 'UZS')
        {
            $amount = floatval($request->amount);
            $money->usd = strval(round($amount/$uzs_usd, 2));
            $money->rub = strval(round($amount/$rub_uzs, 2));
            $money->uzs = strval(round($amount, 2));
            
        }

        $money->type = $request->type;
        $money->servicetype = $request->servicetype;
        $money->description = $request->description . " Текуший курсы: " . " Рубль к доллару: ".$currencyy[0]->rub_usd. " Рубль к суму: ".$currencyy[0]->rub_uzs. " Сум к доллару: ".$currencyy[0]->uzs_usd;
        $money->dategive = $current->format('d-m-y');
        $money->status = 'Received';
        $money->datereceive = $current->format('d-m-y');
        // dd($request->all());
        $money->save();
        // $money->where('id', $id)->update($request->all());
    //    return view('listmoney');
        $moneys = MoneyModel::paginate(10);

       return view('listmoney', compact('moneys'));

    }
     
    public function deletemoney($id)
    {
        $money = MoneyModel::where('id',$id)->delete();
        return redirect()->route('listmoney');
    }
    
    public function destroy(MoneyModel $money)
{
    $money->delete();
    return redirect()->route('listmoney');
}
}
