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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();;
            $table->text('bio')->nullable();
            $table->string('email');
            $table->integer('status')->default(1)->comment('1=active 0=deactive');
            $table->text('profile_pic')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('bid_amount')->default(0)->unsigned()->comment('user bid amounts');
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
};
