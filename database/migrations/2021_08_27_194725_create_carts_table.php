<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->uuid('cart_id');
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadOnDelete();
            $table->integer('quantity');
            $table->foreignId('size_id')->constrained('sizes')->cascadOnDelete();
            $table->foreignId('color_id')->constrained('colors')->cascadOnDelete();
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
        Schema::dropIfExists('carts');
    }
}
