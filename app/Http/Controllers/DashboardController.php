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
use Carbon\Carbon;

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

    public function listsorting()
    {

        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);


        $usd_sumSP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->where('created_at', '>=', Carbon::today())->sum('usd');
        $rub_sumSP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->where('created_at', '>=', Carbon::today())->sum('rub');
        $uzs_sumSP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->where('created_at', '>=', Carbon::today())->sum('uzs');

        $usd_sumVP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->where('created_at', '>=', Carbon::yesterday())->sum('usd');
        $rub_sumVP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->where('created_at', '>=', Carbon::yesterday())->sum('rub');
        $uzs_sumVP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->where('created_at', '>=', Carbon::yesterday())->sum('uzs');

        $usd_sumNP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->whereBetween('created_at', [$start_week, $end_week])->sum('usd');
        $rub_sumNP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->whereBetween('created_at', [$start_week, $end_week])->sum('rub');
        $uzs_sumNP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->whereBetween('created_at', [$start_week, $end_week])->sum('uzs');

        $usd_sumN7 = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('usd');
        $rub_sumN7 = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('rub');
        $uzs_sumN7 = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('uzs');


        $usd_sumMP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('usd');
        $rub_sumMP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('rub');
        $uzs_sumMP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('uzs');

        $usd_sumALLP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->sum('usd');
        $rub_sumALLP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->sum('rub');
        $uzs_sumALLP = MoneyModel::where('servicetype', '!=', 'В Займы (нал.)', 'AND', '!=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->sum('uzs');


        $usd_sumSD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->where('created_at', '>=', Carbon::today())->sum('usd');
        $rub_sumSD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->where('created_at', '>=', Carbon::today())->sum('rub');
        $uzs_sumSD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->where('created_at', '>=', Carbon::today())->sum('uzs');

        $usd_sumVD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->where('created_at', '>=', Carbon::yesterday())->sum('usd');
        $rub_sumVD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->where('created_at', '>=', Carbon::yesterday())->sum('rub');
        $uzs_sumVD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->where('created_at', '>=', Carbon::yesterday())->sum('uzs');

        $usd_sumND = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->whereBetween('created_at', [$start_week, $end_week])->sum('usd');
        $rub_sumND = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->whereBetween('created_at', [$start_week, $end_week])->sum('rub');
        $uzs_sumND = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->whereBetween('created_at', [$start_week, $end_week])->sum('uzs');

        $usd_sumND7 = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('usd');
        $rub_sumND7 = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('rub');
        $uzs_sumND7 = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('uzs');

        $usd_sumMD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('usd');
        $rub_sumMD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('rub');
        $uzs_sumMD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('uzs');

        $usd_sumALLD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'USD')->sum('usd');
        $rub_sumALLD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'RUB')->sum('rub');
        $uzs_sumALLD = MoneyModel::where('servicetype', '=', 'В Займы (нал.)', 'AND', '=', 'В Займы (кар.)')
        ->where('type', '=', 'UZS')->sum('uzs');

      

        return view('listsorting', [
                                    'usd_sumSP' => $usd_sumSP, 
                                    'rub_sumSP' => $rub_sumSP, 
                                    'uzs_sumSP' => $uzs_sumSP,

                                    'usd_sumVP' => $usd_sumVP,
                                    'rub_sumVP' => $rub_sumVP,
                                    'uzs_sumVP' => $uzs_sumVP,

                                    'usd_sumNP'=> $usd_sumNP,
                                    'rub_sumNP'=> $rub_sumNP,
                                    'uzs_sumNP'=> $uzs_sumNP,

                                    'usd_sumN7'=> $usd_sumN7,
                                    'rub_sumN7'=> $rub_sumN7,
                                    'uzs_sumN7'=> $uzs_sumN7,

                                    'usd_sumMP'=> $usd_sumMP,
                                    'rub_sumMP'=> $rub_sumMP,
                                    'uzs_sumMP'=> $uzs_sumMP,

                                    'usd_sumALLP'=> $usd_sumALLP,
                                    'rub_sumALLP'=> $rub_sumALLP,
                                    'uzs_sumALLP'=> $uzs_sumALLP,


                                    /////
                                    'usd_sumSD' => $usd_sumSD, 
                                    'rub_sumSD' => $rub_sumSD, 
                                    'uzs_sumSD' => $uzs_sumSD,

                                    'usd_sumVD' => $usd_sumVD,
                                    'rub_sumVD' => $rub_sumVD,
                                    'uzs_sumVD' => $uzs_sumVD,

                                    'usd_sumND'=> $usd_sumND,
                                    'rub_sumND'=> $rub_sumND,
                                    'uzs_sumND'=> $uzs_sumND,

                                    'usd_sumND7'=> $usd_sumND7,
                                    'rub_sumND7'=> $rub_sumND7,
                                    'uzs_sumND7'=> $uzs_sumND7,

                                    'usd_sumMD'=> $usd_sumMD,
                                    'rub_sumMD'=> $rub_sumMD,
                                    'uzs_sumMD'=> $uzs_sumMD,

                                    'usd_sumALLD'=> $usd_sumALLD,
                                    'rub_sumALLD'=> $rub_sumALLD,
                                    'uzs_sumALLD'=> $uzs_sumALLD
                                    
                                    ]);
    }
    public function listsortingf(Request $request)
    {
        dd($request->all());
        // return view('listsorting');
    }
}
