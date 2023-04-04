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
        Schema::create('Usuario', function (Blueprint $table) {
            $table->bigIncrements('IDU');
            $table->string('nameU');
            $table->string('email')->unique();            
            $table->string('LastNameP');
            $table->string('LastNameM');
            $table->string('password');
            $table->rememberToken();
            $table->bigInteger('id')->unsigned();
            $table->integer('IDEP')->unsigned();
            $table->timestamps();
            $table->foreign('id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('IDEP')->references('IDEP')->on('Departamento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Usuario');
    }
};
