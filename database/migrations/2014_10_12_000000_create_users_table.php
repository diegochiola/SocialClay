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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('surname');
            $table->date('date_of_birth')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number');
            $table->string('location')->nullable();
            $table->string('photo')->nullable(); //ubicacion de la foto
            $table->rememberToken(); //token para la opcion recuerdame
            $table->timestamps(); //crean el created_at updated_at
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
