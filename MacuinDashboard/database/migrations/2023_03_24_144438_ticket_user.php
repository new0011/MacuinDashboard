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
        Schema::create('TicketUser', function (Blueprint $table) {
            $table->bigIncrements('IDUT');
            $table->bigInteger('IDU')->unsigned();
            $table->bigInteger('IDTick')->unsigned();
            $table->timestamps();

            $table->foreign('IDU')->references('IDU')->on('Usuario')->onDelete('cascade');
            $table->foreign('IDTick')->references('IDTick')->on('Ticket')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TicketUser');
    }
};
