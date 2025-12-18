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
        Schema::create('momo_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(0);
            $table->boolean('mode')->default(0);
            $table->string('partner_code');
            $table->string('access_key');
            $table->string('secret_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('momo_settings');
    }
};
