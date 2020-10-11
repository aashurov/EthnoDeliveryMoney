<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrencyModel;

class CurrencyController extends Controller
{
    public function listcurrency()
    {
        $currencys = CurrencyModel::all();
        return view('listcurrency', ['currencys'=>$currencys]);
    }

    public function addcurrency()
    {
        return view('addcurrency');
        
    }

    public function savecurrency(Request $request)
    {
        $currencys = new CurrencyModel();
        $currencys->rub_usd = $request->rub_usd;
        $currencys->rub_uzs = $request->rub_uzs;
        $currencys->uzs_usd = $request->uzs_usd;
        $currencys->save();
        $currencyss = CurrencyModel::all();
        return view('listcurrency', ['currencys'=>$currencyss]);
    }

    public function editcurrency($id)
    {
        $currencys = CurrencyModel::find($id);
        return view('editcurrency', ['currencys'=>$currencys]);

        
    }
    public function updatecurrency(Request $request, $id)
    {
        $currencys =  CurrencyModel::find($id);
        $currencys->rub_usd = $request->rub_usd;
        $currencys->rub_uzs = $request->rub_uzs;
        $currencys->uzs_usd = $request->uzs_usd;
        $currencys->save();

        $currency = CurrencyModel::all();

        return view('listcurrency', ['currencys'=>$currency]);

    }
    public function deletecurrency($id)
    {
        $currency = CurrencyModel::where('id',$id)->delete();
        return redirect()->route('listcurrency');
    }
}
