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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->integer('current_price')->default(0);
            $table->unsignedBigInteger('current_winner_id')->nullable();
            $table->foreign('current_winner_id')->references('id')->on('users');

            $table->integer('no_jumper_limit')->nullable();
            $table->timestamp('start_time')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('timer')->useCurrentOnUpdate()->useCurrent();
            $table->integer('min_price')->default(0)->comment('minimum price which auction can finish otherwise wait for new order');
            $table->integer('status')->default(1)->comment('1=active 0=deactive 3=finished 100=running');
            $table->unsignedBigInteger('final_winner_id')->nullable();

            $table->foreign('final_winner_id')->references('id')->on('users');

            $table->foreignId('product_id')->constrained();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions');
    }
};
