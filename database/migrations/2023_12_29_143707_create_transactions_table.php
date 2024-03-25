<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('amount');
            $table->string('order_id')->comment('auto generated id for tracking from service provider');
            $table->integer('item_type')->comment('	1 => pay for buy bid / 2 =>for buying product(item_id is shipped id)');
            $table->bigInteger('item_id')->unsigned()->nullable()->comment('could be a bid package or a user_shipped_product based on item_type');
            $table->string('payment_description');
            $table->string('payment_id')->comment('service provider payment link');
            $table->integer('status')->comment('1=> new and pending / 100 => sucsess full payment 300=>partially paid / 400 => failed payment');
            $table->integer('partially_paid_amount')->default(0)->comment('if payment has done partially, this is the amount');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
