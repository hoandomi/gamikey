<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paypal_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->boolean('mode')->default(0);
            $table->integer('currency_rate')->default(24000);
            $table->string('client_id')->nullable();
            $table->string('client_secret')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paypal_settings');
    }
};
