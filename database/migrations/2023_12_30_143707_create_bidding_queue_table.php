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
        Schema::create('bidding_queue', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bid_buddy_id')->constrained();

            $table->foreignId('auction_id')->constrained();

            $table->integer('status')->comment(' 1 = pending  0=excuted');
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
        Schema::dropIfExists('bidding_queue');
    }
};
