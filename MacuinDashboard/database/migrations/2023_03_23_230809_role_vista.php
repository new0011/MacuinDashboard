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
        Schema::create('RoleVista', function (Blueprint $table) {
            $table->increments('IDRV');
            $table->integer('IDRole')->unsigned();
            $table->integer('IDVista')->unsigned();
            $table->timestamps();

            $table->foreign('IDRole')->references('IDRole')->on('Role');
            $table->foreign('IDVista')->references('IDVista')->on('Vista');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RoleVista');
    }
};
