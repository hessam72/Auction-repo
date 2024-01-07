<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tempraries', function (Blueprint $table) {
            $table->id();
            $table->string('val')->nullable();
            $table->integer('type')->nullable()->comment('can be image=>2 or text=>1');
            $table->integer('key')->nullable()->comment('for multi item ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempraries');
    }
};
