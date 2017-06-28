<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponCustomerTable extends Migration
{
    /**
     * Run the migrations.
     * @table coupon_customer
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_customer', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('coupon_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->tinyInteger('status')->default('0')->comment('Coupon Customer Status:
1: Used
0: Unused');

            $table->foreign('coupon_id', 'coupon_customer_coupon_id_foreign_idx')
                ->references('id')->on('coupons')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('customer_id', 'coupon_customer_customer_id_foreign_idx')
                ->references('id')->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
        Schema::dropIfExists('coupon_customer');
     }
}
