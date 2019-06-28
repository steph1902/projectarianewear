<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            $table->string('product_name',150)->unique();
            $table->bigInteger('product_price')->nullable();
            $table->string('product_size_in_cm')->nullable();
            $table->string('product_material')->nullable();
            $table->string('product_description',200)->nullable();
            $table->string('product_wash_instruction',200)->nullable();

            $table->string('product_new_arrival_flag',10)->nullable();
            $table->string('product_best_seller_flag',10)->nullable();
            $table->string('product_must_haves_flag',10)->nullable();


            $table->integer('product_stock');

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
