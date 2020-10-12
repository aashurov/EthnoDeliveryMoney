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
use App\Models\TransactionModel;
class DashboardController extends Controller
{
    public function dashboard()
    {
        $usd_sum = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->sum('usd');
        $rub_sum = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->sum('rub');
        $uzs_sum = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->sum('uzs');

        $usd_suml = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->sum('usd');
        $rub_suml = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->sum('rub');
        $uzs_suml = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->sum('uzs');

        $usd_sumtr = TransactionModel::where('type', '=', 'USD')->sum('usd');
        $rub_sumtr = TransactionModel::where('type', '=', 'RUB')->sum('rub');
        $uzs_sumtr = TransactionModel::where('type', '=', 'UZS')->sum('uzs');

        $customers = CustomerModel::get()->count();
        $couriers = CourierModel::get()->count();


        return view('dashboard', ['usd_sum'=>$usd_sum, 
                                  'rub_sum'=>$rub_sum, 
                                  'uzs_sum'=>$uzs_sum,
                                  'usd_suml'=>$usd_suml, 
                                  'rub_suml'=>$rub_suml, 
                                  'uzs_suml'=>$uzs_suml,
                                  'customers'=>$customers,
                                  'couriers'=>$couriers,
                                  'usd_sumtr'=>$usd_sumtr,
                                  'rub_sumtr'=>$rub_sumtr,
                                  'uzs_sumtr'=>$uzs_sumtr
                                  ]);
    }
}
