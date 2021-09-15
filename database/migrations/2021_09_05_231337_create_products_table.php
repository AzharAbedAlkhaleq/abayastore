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
          //  $table->string('code')->unique();
            $table->string('name_ar')->nullable();
            $table->string('slug_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('small_desc_ar')->nullable();
            $table->string('small_desc_en')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
            $table->double('orginal_price')->nullable();
            $table->double('Selling_price')->defualt('0');
            $table->string('quantity')->nullable();
            $table->string('tax')->default('5');
            $table->string('image_ar')->nullable();
            $table->string('image_en')->nullable();
            $table->string('banner')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('trending')->nullable();
            $table->string('video')->nullable();
            $table->integer('views');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
