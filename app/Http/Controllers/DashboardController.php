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
class DashboardController extends Controller
{
    public function dashboard()
    {
        $usd_sum = MoneyModel::where('servicetype', '!=', 'Loan')->sum('usd');
        $rub_sum = MoneyModel::where('servicetype', '!=', 'Loan')->sum('rub');
        $uzs_sum = MoneyModel::where('servicetype', '!=', 'Loan')->sum('uzs');

        $usd_suml = MoneyModel::where('servicetype', '=', 'Loan')->sum('usd');
        $rub_suml = MoneyModel::where('servicetype', '=', 'Loan')->sum('rub');
        $uzs_suml = MoneyModel::where('servicetype', '=', 'Loan')->sum('uzs');

        $customers = CustomerModel::get()->count();
        $couriers = CourierModel::get()->count();


        return view('dashboard', ['usd_sum'=>$usd_sum, 
                                  'rub_sum'=>$rub_sum, 
                                  'uzs_sum'=>$uzs_sum,
                                  'usd_suml'=>$usd_suml, 
                                  'rub_suml'=>$rub_suml, 
                                  'uzs_suml'=>$uzs_suml,
                                  'customers'=>$customers,
                                  'couriers'=>$couriers
                                  ]);
    }
}
