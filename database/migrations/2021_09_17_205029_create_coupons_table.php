<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('type');
            $table->string('value')->nullable();
            //$table->text('description')->nullable();
            $table->string('use_time')->nullable();
            $table->string('used_time')->default(0);
            $table->dateTime('start_date')->nullable();    
            $table->dateTime('expire_date')->nullable();    
            $table->tinyInteger('status')->default(0); 
            $table->unsignedDecimal('greater_than');   
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
        Schema::dropIfExists('coupons');
    }
}
