<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use SoftDeletes;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image');
            $table->integer('price');
            $table->integer('discount_price')->default(0);
            $table->string('type')->default("key")->comment("key, Tài Khoản, Nâng Cấp");
            $table->string('slug_type')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('search')->default(0);
            $table->integer('status')->default(1);
            $table->integer('purchased')->default(0);
            $table->integer('category_id');
            $table->integer('sub_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('tags_id');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
