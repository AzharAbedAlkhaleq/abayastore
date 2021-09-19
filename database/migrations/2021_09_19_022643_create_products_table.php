<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->index();
            $table->foreignId('size_id')->index();
            $table->foreignId('color_id')->index();
            $table->string('code')->unique();
            $table->string('name_ar');
            $table->string('slug_ar')->unique();
            $table->string('name_en');
            $table->string('slug_en')->unique();
            $table->string('small_desc_ar')->nullable();
            $table->string('small_desc_en')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
            $table->double('orginal_price')->nullable();
            $table->double('Selling_price')->defualt('0');
            $table->string('quantity')->nullable();
            $table->string('tax')->default('5');
            $table->string('image_ar');
            $table->string('gallery')->nullable();
            //$table->string('size')->nullable();
            $table->boolean('status')->nullable();
            // $table->tinyInteger('status')->nullable();
            $table->string('trending')->nullable();
            $table->string('video')->nullable();
           // $table->integer('views');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('products');
    }
}
