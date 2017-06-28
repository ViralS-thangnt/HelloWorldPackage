<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     * @table coupons
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('code');
            $table->double('discount_rate')->default(0);
            $table->tinyInteger('discount_rate_type')->default(COUPON_DISCOUNT_RATE_TYPE_PERCENT)->comment('0:Percent. 1:Number');
            $table->datetime('start_date');
            $table->datetime('expired_date');
            $table->tinyInteger('type')->comment('0: COUPON_TYPE_PUBLIC. 1: COUPON_TYPE_PRIVATE');
            $table->integer('image_id')->nullable();
            $table->integer('applied')->default(0);
            $table->string('images', 500)->nullable()->default('[]');
            $table->string('customer_applied', 500)->nullable()->default('[]')
                    ->comment('JSON Field. Example data: [1]');

            $table->tinyInteger('status')->default(COUPON_STATUS_ACTIVE)->comment('0:Active\n1:Expired\n2:Used');
            $table->softDeletes();
            $table->nullableTimestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('coupons');
     }
}
