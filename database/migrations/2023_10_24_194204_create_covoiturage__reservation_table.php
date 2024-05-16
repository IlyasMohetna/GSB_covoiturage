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
        Schema::disableForeignKeyConstraints();
        Schema::create('reservation', function (Blueprint $table) {
            $table->id('id_reservation')->index();
            $table->dateTime('date_de_reservation');
            $table->foreignId('code_employe')->index()->foreign()->references('code_employe')->on('employe');
            $table->foreignId('id_trajet')->index()->foreign()->references('id_trajet')->on('trajet');
            $table->foreignId('id_etape_depart')->index()->foreign()->references('id_etape')->on('etape');
            $table->foreignId('id_etape_arrive')->index()->foreign()->references('id_etape')->on('etape');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
