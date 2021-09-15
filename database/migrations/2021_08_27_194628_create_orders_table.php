<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->foreignId('address_id')->index();
            // $table->foreignId('coupon_id')->index();
            $table->string('payment_method');
            $table->enum('payment_status',['paid','unpaid']);
            $table->string('transaction_id');
            $table->double('subtotal')->nullable();
            $table->double('delivery')->nullable();
            $table->double('grandtotal')->nullable();
            $table->enum('status',['pending','preparing','in_route','canceled','refound','completed'])->default('pending');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('address_id')->references('id')->on("addresses")->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('coupon_id')->references('id')->on("coupons")->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
