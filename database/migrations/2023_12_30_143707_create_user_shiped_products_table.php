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
        Schema::create('user_shiped_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();

            $table->integer('status')->comment('deivered or not');
            $table->text('address');
            $table->integer('postal_code');
            $table->integer('price')->default(0);

            $table->foreignId('product_id')->constrained();
            $table->foreignId('state_id')->constrained();

            $table->foreignId('city_id')->constrained();
            $table->foreignId('transaction_id')->constrained();

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
        Schema::dropIfExists('user_shiped_products');
    }
};
