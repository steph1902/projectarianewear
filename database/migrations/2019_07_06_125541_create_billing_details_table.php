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
            $table->string('provinces',100);
            $table->string('cities',100);
            $table->string('postal_code',100);
            $table->string('email',100);
            $table->string('phone',100);
            $table->string('notes',200);
            $table->string('product_name',100);
            $table->string('product_colour',100);
            $table->string('product_size',100);
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
