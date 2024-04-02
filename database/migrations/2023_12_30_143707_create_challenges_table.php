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
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reward_id')->constrained();

            $table->string('description');
            $table->integer('type')->comment('the type of action that challenge require: 1=bidding  2=win an auction ');
            $table->integer('time_type')->comment('1= daily 2=weekly 3=mounthly');
            $table->foreignId('category_id')->constrained();

            $table->integer('number_to_win')->comment('how many times user have to (ex:bid) in specific category to win');
            $table->string('level')->default('beginner')->comment(' level of challenge to assign to currect users: beginner: has no win in auctoin or place less than 1000 bids / intermediate => 1 win in auction or more than 1000 bids / pro => 3 or more win or more than 3000 bids');
            $table->integer('status')->default(1)->comment(' 1=active 0=deactive');
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
        Schema::dropIfExists('challenges');
    }
};
