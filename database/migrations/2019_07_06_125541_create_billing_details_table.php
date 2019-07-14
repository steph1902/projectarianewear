<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id',100)->unique();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('address',200);
            $table->string('provinces',100)->nullable();
            $table->string('cities',100)->nullable();
            $table->string('postal_code',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('notes',200)->nullable();
            $table->string('product_name',100)->nullable();
            $table->string('product_colour',100)->nullable();
            $table->string('product_size',100)->nullable();
            $table->bigInteger('total_weight');
            $table->bigInteger('total_price');
            $table->string('status')->default('pending');
            $table->string('snap_token')->nullable();
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
        Schema::dropIfExists('billing_details');
    }
}
