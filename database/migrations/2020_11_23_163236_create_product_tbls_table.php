<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tbls', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_size');
            $table->string('product_color');
            $table->boolean('publication_status')->default(false);
            $table->text('product_description');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('manufactor_id');
            $table->foreign('category_id')->references('id')->on('category_tbls')->onDelete('cascade');
            $table->foreign('manufactor_id')->references('id')->on('manufactor_tbls')->onDelete('cascade');
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
        Schema::dropIfExists('product_tbls');
    }
}
