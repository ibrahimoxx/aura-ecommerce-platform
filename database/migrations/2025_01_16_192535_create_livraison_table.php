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
        Schema::create('livraison', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("codeCom");
            $table->unsignedBigInteger("idClient");
            $table->foreign('codeCom')->references('codeCom')->on('commandes')->onDelete('cascade');
            $table->foreign("idClient")->references("id")->on("users");
            $table->date('dateLiv');
            $table->decimal('prixtotal', 8, 2);
            $table->string('status')->default('non valider');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraison');
    }
};
