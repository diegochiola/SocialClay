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
            $table->string('name', 120);
            $table->string('surname', 120);
            $table->date('date_of_birth');
            $table->string('email', 50)->unique();
            $table->string('password', 50);
            $table->string('phone_number', 20);
            $table->unsignedBigInteger('role_id'); //llamara a la tabla Roles
            $table->string('location', 250)->nullable();
            $table->string('photo')->nullable(); //ubicacion de la foto
            $table->rememberToken(); //token para la opcion recuerdame
            $table->timestamps(); //crean el created_at updated_at

            //creamos la conexion con la tabla Roles
            $table->foreing('role_id')->references('id')->on('roles');

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
