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
use App\Models\LoanModel;


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

        $usd_suml = LoanModel::where('type', '=', 'USD')->sum('usd');
        $rub_suml = LoanModel::where('type', '=', 'RUB')->sum('rub');
        $uzs_suml = LoanModel::where('type', '=', 'UZS')->sum('uzs');

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
        // dd('salom');
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
        $yesterday = Carbon::now()->subDays(1);
        $beginDate = Carbon::yesterday();
        // dd($yesterday);
        // dd($beginDate);

        $usd_sumSP = MoneyModel::where('type', '=', 'USD')->where('created_at', '>=', Carbon::today())->sum('usd');
        $rub_sumSP = MoneyModel::where('type', '=', 'RUB')->where('created_at', '>=', Carbon::today())->sum('rub');
        $uzs_sumSP = MoneyModel::where('type', '=', 'UZS')->where('created_at', '>=', Carbon::today())->sum('uzs');

        $usd_sumVP = MoneyModel::where('type', '=', 'USD')->whereDate('created_at', $yesterday)->sum('usd');
        $rub_sumVP = MoneyModel::where('type', '=', 'RUB')->whereDate('created_at', $yesterday)->sum('rub');
        $uzs_sumVP = MoneyModel::where('type', '=', 'UZS')->whereDate('created_at', $yesterday)->sum('uzs');

        $usd_sumNP = MoneyModel::where('type', '=', 'USD')->whereBetween('created_at', [$start_week, $end_week])->sum('usd');
        $rub_sumNP = MoneyModel::where('type', '=', 'RUB')->whereBetween('created_at', [$start_week, $end_week])->sum('rub');
        $uzs_sumNP = MoneyModel::where('type', '=', 'UZS')->whereBetween('created_at', [$start_week, $end_week])->sum('uzs');

        $usd_sumN7 = MoneyModel::where('type', '=', 'USD')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('usd');
        $rub_sumN7 = MoneyModel::where('type', '=', 'RUB')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('rub');
        $uzs_sumN7 = MoneyModel::where('type', '=', 'UZS')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('uzs');


        $usd_sumMP = MoneyModel::where('type', '=', 'USD')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('usd');
        $rub_sumMP = MoneyModel::where('type', '=', 'RUB')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('rub');
        $uzs_sumMP = MoneyModel::where('type', '=', 'UZS')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('uzs');

        $usd_sumALLP = MoneyModel::where('type', '=', 'USD')->sum('usd');
        $rub_sumALLP = MoneyModel::where('type', '=', 'RUB')->sum('rub');
        $uzs_sumALLP = MoneyModel::where('type', '=', 'UZS')->sum('uzs');


        //// Dolgi VSE
        $usd_sumSD = LoanModel::where('type', '=', 'USD')->where('created_at', '>=', Carbon::today())->sum('usd');
        $rub_sumSD = LoanModel::where('type', '=', 'RUB')->where('created_at', '>=', Carbon::today())->sum('rub');
        $uzs_sumSD = LoanModel::where('type', '=', 'UZS')->where('created_at', '>=', Carbon::today())->sum('uzs');

        $usd_sumVD = LoanModel::where('type', '=', 'USD')->whereDate('created_at', $yesterday)->sum('usd');
        $rub_sumVD = LoanModel::where('type', '=', 'RUB')->whereDate('created_at', $yesterday)->sum('rub');
        $uzs_sumVD = LoanModel::where('type', '=', 'UZS')->whereDate('created_at', $yesterday)->sum('uzs');

        $usd_sumND = LoanModel::where('type', '=', 'USD')->whereBetween('created_at', [$start_week, $end_week])->sum('usd');
        $rub_sumND = LoanModel::where('type', '=', 'RUB')->whereBetween('created_at', [$start_week, $end_week])->sum('rub');
        $uzs_sumND = LoanModel::where('type', '=', 'UZS')->whereBetween('created_at', [$start_week, $end_week])->sum('uzs');

        $usd_sumND7 = LoanModel::where('type', '=', 'USD')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('usd');
        $rub_sumND7 = LoanModel::where('type', '=', 'RUB')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('rub');
        $uzs_sumND7 = LoanModel::where('type', '=', 'UZS')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('uzs');

        $usd_sumMD = LoanModel::where('type', '=', 'USD')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('usd');
        $rub_sumMD = LoanModel::where('type', '=', 'RUB')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('rub');
        $uzs_sumMD = LoanModel::where('type', '=', 'UZS')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('uzs');

        $usd_sumALLD = LoanModel::where('type', '=', 'USD')->sum('usd');
        $rub_sumALLD = LoanModel::where('type', '=', 'RUB')->sum('rub');
        $uzs_sumALLD = LoanModel::where('type', '=', 'UZS')->sum('uzs');


        ///Dolgi Vzyal

        $usd_sumSDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'USD')->where('created_at', '>=', Carbon::today())->sum('usd');
        $rub_sumSDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'RUB')->where('created_at', '>=', Carbon::today())->sum('rub');
        $uzs_sumSDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'UZS')->where('created_at', '>=', Carbon::today())->sum('uzs');

        $usd_sumVDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'USD')->whereDate('created_at', $yesterday)->sum('usd');
        $rub_sumVDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'RUB')->whereDate('created_at', $yesterday)->sum('rub');
        $uzs_sumVDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'UZS')->whereDate('created_at', $yesterday)->sum('uzs');

        $usd_sumNDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'USD')->whereBetween('created_at', [$start_week, $end_week])->sum('usd');
        $rub_sumNDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'RUB')->whereBetween('created_at', [$start_week, $end_week])->sum('rub');
        $uzs_sumNDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'UZS')->whereBetween('created_at', [$start_week, $end_week])->sum('uzs');

        $usd_sumND7none = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'USD')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('usd');
        $rub_sumND7none = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'RUB')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('rub');
        $uzs_sumND7none = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'UZS')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('uzs');

        $usd_sumMDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'USD')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('usd');
        $rub_sumMDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'RUB')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('rub');
        $uzs_sumMDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'UZS')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('uzs');

        $usd_sumALLDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'USD')->sum('usd');
        $rub_sumALLDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'RUB')->sum('rub');
        $uzs_sumALLDnone = LoanModel::where('status', '=', 'Взял')->where('type', '=', 'UZS')->sum('uzs');
      

         ///Dolgi Otdal

         $usd_sumSDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'USD')->where('created_at', '>=', Carbon::today())->sum('usd');
         $rub_sumSDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'RUB')->where('created_at', '>=', Carbon::today())->sum('rub');
         $uzs_sumSDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'UZS')->where('created_at', '>=', Carbon::today())->sum('uzs');
 
         $usd_sumVDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'USD')->whereDate('created_at', $yesterday)->sum('usd');
         $rub_sumVDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'RUB')->whereDate('created_at', $yesterday)->sum('rub');
         $uzs_sumVDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'UZS')->whereDate('created_at', $yesterday)->sum('uzs');
 
         $usd_sumNDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'USD')->whereBetween('created_at', [$start_week, $end_week])->sum('usd');
         $rub_sumNDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'RUB')->whereBetween('created_at', [$start_week, $end_week])->sum('rub');
         $uzs_sumNDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'UZS')->whereBetween('created_at', [$start_week, $end_week])->sum('uzs');
 
         $usd_sumND7yes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'USD')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('usd');
         $rub_sumND7yes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'RUB')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('rub');
         $uzs_sumND7yes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'UZS')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('uzs');
 
         $usd_sumMDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'USD')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('usd');
         $rub_sumMDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'RUB')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('rub');
         $uzs_sumMDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'UZS')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('uzs');
 
         $usd_sumALLDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'USD')->sum('usd');
         $rub_sumALLDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'RUB')->sum('rub');
         $uzs_sumALLDyes = LoanModel::where('status', '=', 'Отдал')->where('type', '=', 'UZS')->sum('uzs');


          //// Rasxod 
        $usd_sumSTR = TransactionModel::where('type', '=', 'USD')->where('created_at', '>=', Carbon::today())->sum('usd');
        $rub_sumSTR = TransactionModel::where('type', '=', 'RUB')->where('created_at', '>=', Carbon::today())->sum('rub');
        $uzs_sumSTR = TransactionModel::where('type', '=', 'UZS')->where('created_at', '>=', Carbon::today())->sum('uzs');

        $usd_sumVTR = TransactionModel::where('type', '=', 'USD')->whereDate('created_at', $yesterday)->sum('usd');
        $rub_sumVTR = TransactionModel::where('type', '=', 'RUB')->whereDate('created_at', $yesterday)->sum('rub');
        $uzs_sumVTR = TransactionModel::where('type', '=', 'UZS')->whereDate('created_at', $yesterday)->sum('uzs');

        $usd_sumNTR = TransactionModel::where('type', '=', 'USD')->whereBetween('created_at', [$start_week, $end_week])->sum('usd');
        $rub_sumNTR = TransactionModel::where('type', '=', 'RUB')->whereBetween('created_at', [$start_week, $end_week])->sum('rub');
        $uzs_sumNTR = TransactionModel::where('type', '=', 'UZS')->whereBetween('created_at', [$start_week, $end_week])->sum('uzs');

        $usd_sumNTR7 = TransactionModel::where('type', '=', 'USD')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('usd');
        $rub_sumNTR7 = TransactionModel::where('type', '=', 'RUB')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('rub');
        $uzs_sumNTR7 = TransactionModel::where('type', '=', 'UZS')->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())->sum('uzs');

        $usd_sumMTR = TransactionModel::where('type', '=', 'USD')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('usd');
        $rub_sumMTR = TransactionModel::where('type', '=', 'RUB')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('rub');
        $uzs_sumMTR = TransactionModel::where('type', '=', 'UZS')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('uzs');

        $usd_sumALLTR = TransactionModel::where('type', '=', 'USD')->sum('usd');
        $rub_sumALLTR = TransactionModel::where('type', '=', 'RUB')->sum('rub');
        $uzs_sumALLTR = TransactionModel::where('type', '=', 'UZS')->sum('uzs');

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


                                    /////Dolgi VSE
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
                                    'uzs_sumALLD'=> $uzs_sumALLD,


                                    /////Dolgi Vzyal
                                    'usd_sumSDnone' => $usd_sumSDnone, 
                                    'rub_sumSDnone' => $rub_sumSDnone, 
                                    'uzs_sumSDnone' => $uzs_sumSDnone,

                                    'usd_sumVDnone' => $usd_sumVDnone,
                                    'rub_sumVDnone' => $rub_sumVDnone,
                                    'uzs_sumVDnone' => $uzs_sumVDnone,

                                    'usd_sumNDnone'=> $usd_sumNDnone,
                                    'rub_sumNDnone'=> $rub_sumNDnone,
                                    'uzs_sumNDnone'=> $uzs_sumNDnone,

                                    'usd_sumND7none'=> $usd_sumND7none,
                                    'rub_sumND7none'=> $rub_sumND7none,
                                    'uzs_sumND7none'=> $uzs_sumND7none,

                                    'usd_sumMDnone'=> $usd_sumMDnone,
                                    'rub_sumMDnone'=> $rub_sumMDnone,
                                    'uzs_sumMDnone'=> $uzs_sumMDnone,

                                    'usd_sumALLDnone'=> $usd_sumALLDnone,
                                    'rub_sumALLDnone'=> $rub_sumALLDnone,
                                    'uzs_sumALLDnone'=> $uzs_sumALLDnone,


                                     /////Dolgi Otdal
                                     'usd_sumSDyes' => $usd_sumSDyes, 
                                     'rub_sumSDyes' => $rub_sumSDyes, 
                                     'uzs_sumSDyes' => $uzs_sumSDyes,
 
                                     'usd_sumVDyes' => $usd_sumVDyes,
                                     'rub_sumVDyes' => $rub_sumVDyes,
                                     'uzs_sumVDyes' => $uzs_sumVDyes,
 
                                     'usd_sumNDyes'=> $usd_sumNDyes,
                                     'rub_sumNDyes'=> $rub_sumNDyes,
                                     'uzs_sumNDyes'=> $uzs_sumNDyes,
 
                                     'usd_sumND7yes'=> $usd_sumND7yes,
                                     'rub_sumND7yes'=> $rub_sumND7yes,
                                     'uzs_sumND7yes'=> $uzs_sumND7yes,
 
                                     'usd_sumMDyes'=> $usd_sumMDyes,
                                     'rub_sumMDyes'=> $rub_sumMDyes,
                                     'uzs_sumMDyes'=> $uzs_sumMDyes,
 
                                     'usd_sumALLDyes'=> $usd_sumALLDyes,
                                     'rub_sumALLDyes'=> $rub_sumALLDyes,
                                     'uzs_sumALLDyes'=> $uzs_sumALLDyes,

                                     /////Rasxod
                                     'usd_sumSTR' => $usd_sumSTR, 
                                     'rub_sumSTR' => $rub_sumSTR, 
                                     'uzs_sumSTR' => $uzs_sumSTR,
 
                                     'usd_sumVTR' => $usd_sumVTR,
                                     'rub_sumVTR' => $rub_sumVTR,
                                     'uzs_sumVTR' => $uzs_sumVTR,
 
                                     'usd_sumNTR'=> $usd_sumNTR,
                                     'rub_sumNTR'=> $rub_sumNTR,
                                     'uzs_sumNTR'=> $uzs_sumNTR,
 
                                     'usd_sumNTR7'=> $usd_sumNTR7,
                                     'rub_sumNTR7'=> $rub_sumNTR7,
                                     'uzs_sumNTR7'=> $uzs_sumNTR7,
 
                                     'usd_sumMTR'=> $usd_sumMTR,
                                     'rub_sumMTR'=> $rub_sumMTR,
                                     'uzs_sumMTR'=> $uzs_sumMTR,
 
                                     'usd_sumALLTR'=> $usd_sumALLTR,
                                     'rub_sumALLTR'=> $rub_sumALLTR,
                                     'uzs_sumALLTR'=> $uzs_sumALLTR
                                    
                                    ]);
    }
    public function listsortingf(Request $request)
    {
        dd($request->all());
        // return view('listsorting');
    }
}
