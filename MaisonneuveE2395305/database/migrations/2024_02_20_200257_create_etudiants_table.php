<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('adresse')->nullable();
        $table->string('telephone')->nullable();
        $table->string('email')->nullable();
        $table->date('date_de_naissance')->nullable();
        $table->unsignedBigInteger('ville_id');
        $table->timestamps();
        
        $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
