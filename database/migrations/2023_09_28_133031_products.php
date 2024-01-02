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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producer')->constrained('producers');
            $table->foreignId('id_category')->constrained('categories');
            $table->foreignId('id_subcategory')->constrained('subcategories');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('status')->default(0);  // 0 - відсутній, 1 - під замовлення, 2 - присутній
            $table->timestamps();
            $table->softDeletes();
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
