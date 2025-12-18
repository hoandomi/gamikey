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
        Schema::create('product_account_stores', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('code')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->boolean('used')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_account_stores');
    }
};
