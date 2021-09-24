<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('slug_ar')->index()->unique();
            $table->string('name_en');
            $table->string('slug_en')->index()->unique();
            $table->tinyInteger('status')->default('0');
            //$table->tinyInteger('popular')->default('0')->nullable();
             //$table->string('small_desc_ar')->nullable();
            //$table->string('small_desc_en')->nullable();
            //$table->string('description_ar')->nullable();
            //$table->string('description_en')->nullable();
            //$table->boolean('status')->nullable();
            $table->string('image_ar');
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
        Schema::dropIfExists('categories');
    }
}
