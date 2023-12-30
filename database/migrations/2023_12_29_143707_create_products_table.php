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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();

            $table->string('title');
            $table->integer('discount')->default(0)->comment(' precentage of discount when admin promot it ');
            $table->integer('sales_count')->default(0);
            $table->text('short_desc')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('product_inventory')->default(1);
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
        Schema::dropIfExists('products');
    }
};
