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
            $table->string('LastNameP');
            $table->string('LastNameM');
            $table->integer('IDRole')->unsigned();
            $table->integer('IDEP')->unsigned();
            $table->timestamps();

            $table->foreign('IDRole')->references('IDRole')->on('Role');
            $table->foreign('IDEP')->references('IDEP')->on('Departamento');
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
