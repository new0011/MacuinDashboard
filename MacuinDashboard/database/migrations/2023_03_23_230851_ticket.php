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
        Schema::create('Ticket', function (Blueprint $table) {
            $table->bigIncrements('IDTick');
            $table->text('Problema');
            $table->longText('Comentarios');
            $table->integer('IDSta')->unsigned();
            $table->bigInteger('IDCli')->unsigned();
            $table->bigInteger('IDAux')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('IDSta')->references('IDStat')->on('Status')->onDelete('cascade');
            $table->foreign('IDCli')->references('IDU')->on('Usuario')->onDelete('cascade');
            $table->foreign('IDAux')->references('IDU')->on('Usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ticket');
    }
};
