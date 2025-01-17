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
        Schema::create('bag_pro', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("codeBag");
            $table->unsignedBigInteger("codeProd"); 
            $table->integer('quantity');
            $table->integer('totalPrix');
            $table->foreign("codeBag")
            ->references("id")
            ->on("bag")->onDelete('cascade');
            $table->foreign('codeProd')
            ->references('id')
            ->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bag_pro');
    }
};
