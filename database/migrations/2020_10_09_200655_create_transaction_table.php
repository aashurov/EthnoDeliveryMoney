<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('courier_id');
            $table->string('usd');
            $table->string('rub');
            $table->string('uzs');
            $table->string('type');// pul qaysi valyutada berildi
            $table->string('transactiontype'); // pul nimaga olindi yani qarzmi predoplatami perevozkagami
            $table->string('datecreate'); // pul qachon olindi klientdan 
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
