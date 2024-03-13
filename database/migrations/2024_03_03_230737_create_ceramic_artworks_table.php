<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ceramic_artworks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->text('description');
            $table->enum('ceramic_technique', ['Handbuilding', 'Wheel_throwing', 'Slab_building', 'Coiling']);
            $table->date('creation_date')->nullable();
            $table->string('created_by', 125);
            //$table->binary('photo')->nullable()->longBlob();
            $table->binary('photo')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();; 
            $table->timestamps();

           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
          // simplemente porque al hacer la migracion a phpmyadmin no me toma el dato longblob, lo defino aqui:
          DB::statement('ALTER TABLE ceramic_artworks MODIFY photo LONGBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ceramic_artworks');
    }
};