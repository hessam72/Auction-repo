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
        Schema::create('highest_bidders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();

            $table->integer('time_spent')->default(0)->comment('the value is in secounds');
            
            $table->unsignedBigInteger('current_level_id')->default(1);
            // $table->foreign('current_level_id')->references('id')->on('highest_bidder_levels');
            $table->integer('multiplier')->default(1)->comment(' the ratio which user time might get multipy on');
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
        Schema::dropIfExists('highest_bidders');
    }
};
