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
        Schema::create('seacrch_histories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('price_from')->nullable();
            $table->integer('price_to')->nullable();
            $table->integer('user');
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seacrch_histories');
    }
};
