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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();

            $table->foreignId('admin_id')->constrained();

            $table->string('subject');
            $table->text('content')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('seen')->default(0);
            $table->integer('status')->default(1)->comment('1=pending 100=answered 0=closed');
            $table->integer('reply_to_id')->default(0)->index('reply_to_id');
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
        Schema::dropIfExists('tickets');
    }
};
