<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionModel;
use App\Models\CustomerModel;
use App\Models\CourierModel;
use App\Models\TypeModel;
use App\Models\ServiceTypeModel;
use App\Models\CurrencyModel;
use App\Models\TransactionTypeModel;

use Telegram;
use Carbon\Carbon;
class TransactionController extends Controller
{
   public function listtransaction()
   {
    $transactions = TransactionModel::orderBy('created_at', 'desc')->paginate(10);
    return view('listtransaction', compact('transactions'));
   }
   public function addtransaction()
    {
        $couriers = CourierModel::all();
        $types = TypeModel::all();
        $transactiontypes = TransactionTypeModel::all();
        return view('addtransaction', [ 'couriers'=>$couriers, 'types'=>$types, 'transactiontypes'=>$transactiontypes]);
    }
    public function savetransaction(Request $request)
    {
        $current = Carbon::now();
        $transaction = new TransactionModel();
        $transaction->courier_id = $request->couriername;
        // $transaction->courier_id = $request->couriername;

         $currencyy = CurrencyModel::get();
         $rub_usd = floatval($currencyy[0]->rub_usd);
         $rub_uzs = floatval($currencyy[0]->rub_uzs);
         $uzs_usd = floatval($currencyy[0]->uzs_usd);
        if ($request->type == 'USD')
        {
            $amount = floatval($request->amount);
            $transaction->usd = strval(round($amount, 2));
            $transaction->rub = strval(round($amount*$rub_usd, 2));
            $transaction->uzs = strval(round($amount*$uzs_usd, 2));
        }
        elseif($request->type == 'RUB')
        {
            $amount = floatval($request->amount);
            $transaction->usd = strval(round($amount/$rub_usd, 2));
            $transaction->rub = strval(round($amount, 2));
            $transaction->uzs = strval(round($amount/$rub_uzs, 2));
        }
        elseif($request->type == 'UZS')
        {
            $amount = floatval($request->amount);
            $transaction->usd = strval(round($amount/$uzs_usd, 2));
            $transaction->rub = strval(round($amount/$rub_uzs, 2));
            $transaction->uzs = strval(round($amount, 2));
            
        }
        $transaction->type = $request->type;
        $transaction->transactiontype = $request->transactiontype;
        $transaction->description = $request->description . "Текуший курсы: " . " Рубль к доллару: ".$currencyy[0]->rub_usd. " Рубль к суму: ".$currencyy[0]->rub_uzs. " Сум к доллару: ".$currencyy[0]->uzs_usd;
        $transaction->datecreate = $current->format('d-m-y');
        $transaction->save();

        // $response = Telegram::getMe();

        // $botId = $response->getId();
        // $firstName = $response->getFirstName();
        // $username = $response->getUsername();

        // $message = <<<TEXT
        // --------------------------------------------
        // Имя клиента: $transaction->customer_id
        // Имя курера: $transaction->courier_id
        // Сумма в $: $transaction->usd
        // Сумма в рублях: $transaction->rub
        // Сумма в сумах: $transaction->uzs
        // Тип валюты:  $transaction->type
        // Тип сервиса: $transaction->servicetype
        // Дата взятие: $transaction->dategive
        // Дата принятие: $transaction->datereceive
        // Описание: $transaction->description
        // --------------------------------------------
        // TEXT;
        
        // $response = Telegram::sendMessage([
        //     'chat_id' => '971040970', 
        //     'text'=>$message
        //     ]);
          
        //   $messageId = $response->getMessageId();
        return back();

    }

    public function edittransaction($id)
    {
        $transactions = TransactionModel::find($id);
        $couriers = CourierModel::all();
        $types = TypeModel::all();
        $transactiontypes = TransactionTypeModel::all();

        return view('edittransaction', ['transactions'=>$transactions,  'couriers'=>$couriers, 'types'=>$types, 'transactiontypes'=>$transactiontypes]);
    }

    public function updatetransaction(Request $request, $id)
    {
        $current = Carbon::now();
        $transaction =  TransactionModel::find($id);
    
        $transaction->courier_id = $request->couriername;
  
         $currencyy = CurrencyModel::get();
         $rub_usd = floatval($currencyy[0]->rub_usd);
         $rub_uzs = floatval($currencyy[0]->rub_uzs);
         $uzs_usd = floatval($currencyy[0]->uzs_usd);

        if ($request->type == 'USD')
        {
            $amount = floatval($request->amount);
            $transaction->usd = strval(round($amount, 2));
            $transaction->rub = strval(round($amount*$rub_usd, 2));
            $transaction->uzs = strval(round($amount*$uzs_usd, 2));
        }
        elseif($request->type == 'RUB')
        {
            $amount = floatval($request->amount);
            $transaction->usd = strval(round($amount/$rub_usd, 2));
            $transaction->rub = strval(round($amount, 2));
            $transaction->uzs = strval(round($amount/$rub_uzs, 2));
        }
        elseif($request->type == 'UZS')
        {
            $amount = floatval($request->amount);
            $transaction->usd = strval(round($amount/$uzs_usd, 2));
            $transaction->rub = strval(round($amount/$rub_uzs, 2));
            $transaction->uzs = strval(round($amount, 2));
            
        }

        $transaction->type = $request->type;
        $transaction->transactiontype = $request->transactiontype;
        $transaction->description = $request->description . "   Текуший курсы: " . " Рубль к доллару: ".$currencyy[0]->rub_usd. " Рубль к суму: ".$currencyy[0]->rub_uzs. " Сум к доллару: ".$currencyy[0]->uzs_usd;
        $transaction->datecreate = $current->format('d-m-y');
        $transaction->save();
        $transactions = TransactionModel::orderBy('created_at', 'desc')->paginate(10);

       return view('listtransaction', compact('transactions'));

    }
     
    public function deletetransaction($id)
    {
        $transaction = TransactionModel::where('id',$id)->delete();
        return redirect()->route('listtransaction');
    }
    
     
}
