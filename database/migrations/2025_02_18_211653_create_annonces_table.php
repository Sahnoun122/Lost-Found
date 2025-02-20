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

    Schema::create('annonces', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->string('description');
        $table->string('photos');
        $table->string('lieu');
        $table->date('date');
        $table->string('email');
        $table->string('phone');
        $table->unsignedInteger('id_categorie');
        $table->foreign('id_categorie')->references('id')->on('categories')->onUpdate('cascade');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
