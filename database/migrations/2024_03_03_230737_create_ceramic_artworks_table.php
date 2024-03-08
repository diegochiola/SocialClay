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
        Schema::create('ceramic_artworks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('ceramic-Technique', ['Handbuilding', 'Throwing on the Wheel', 'Slip Casting', 'Press Molding', 'Extrusion']); //ceramic technique enum
            $table->date('creation_date')->nullable();
            $table->string('created_by', 120);
            $table->binary('photo')->nullable();
            //$table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            //foreing key con cascade por si se elimina el usuario
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //creamos la conexion con la tabla techniques
            //$table->foreing('ceramic_technique_id')->references('id')->on('ceramicTechniques')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ceramic_artworks');
    }
};
