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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('surname', 120);
            $table->date('date_of_birth');
            $table->string('email', 50)->unique();
            $table->string('password'); 
            $table->string('phone_number', 20);
            $table->enum('role', ['artist', 'enthusiast', 'administrator']);
            $table->string('location', 250)->nullable();
            $table->binary('photo')->nullable();
            //$table->binary('photo')->nullable()->longBlob();;
            $table->rememberToken();
            $table->timestamps();
        });
        // simplemente porque al hacer la migracion a phpmyadmin no me toma el dato longblob, lo defino aqui:
        DB::statement('ALTER TABLE users MODIFY photo LONGBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};