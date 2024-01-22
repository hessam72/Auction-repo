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
        Schema::create('redeem_codes', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->text('code');
            $table->integer('value')->comment('bid amount of code when redeemed');
            $table->integer('use_limit_count')->default(1);
            $table->integer('used_count')->default(0);
            $table->integer('status')->default(1)->comment('1= active code | 2 = used code 3= disabled code');
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
        Schema::dropIfExists('redeem_codes');
    }
};
