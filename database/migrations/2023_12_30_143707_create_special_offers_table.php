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
        Schema::create('special_offers', function (Blueprint $table) {
           
            $table->id();
            $table->string('description')->nullable();
            $table->string('type_desc')->nullable();
            $table->text('banner')->nullable();
            $table->integer('type')->comment('1 bid discount offer 2 product price discount offer');
           
            $table->integer('discount_amount')->default(0)->comment('in percentage');
            $table->integer('item_id')->comment(' can be a bid package or a product');
            $table->timestamp('expiration_date')->useCurrentOnUpdate()->useCurrent();
            $table->integer('status')->default(1)->comment('1= active 0=deative');
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
        Schema::dropIfExists('special_offers');
    }
};
