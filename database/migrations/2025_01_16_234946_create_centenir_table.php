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
        Schema::create('centenir', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codeProd'); 
            $table->unsignedBigInteger('codeCom'); 
            $table->integer('qtePro'); 
            $table->decimal('prixtotal', 8, 2);
            $table->timestamps(); 
            
            
            $table->foreign('codeProd')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('codeCom')->references('codeCom')->on('commandes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centenir');
    }
};
