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
            $table->bigIncrements('id');
            $table->json('name');
            $table->json('description');
            $table->integer('price');
            $table->string('size');
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity');
            $table->integer('category_id');
            $table->integer('admin_id');
            $table->unsignedTinyInteger('Approve')->default(0);        
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
