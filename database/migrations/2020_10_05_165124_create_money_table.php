<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('courier_id');
            $table->string('usd');
            $table->string('rub');
            $table->string('uzs');
            $table->string('type');// pul qaysi valyutada berildi
            $table->string('branch');
            $table->string('servicetype'); // pul nimaga olindi yani qarzmi predoplatami perevozkagami
            $table->string('dategive'); // pul qachon olindi klientdan 
            $table->string('status'); // pul olindi(kurerni qulida) yoki kassaga kelib tushdi (kurer kassaga topshirdi)
            $table->string('datereceive'); // pul qachon qabul qilindi
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
        Schema::dropIfExists('money');
    }
}
