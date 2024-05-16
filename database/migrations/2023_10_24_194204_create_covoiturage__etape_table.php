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
        Schema::create('etape', function (Blueprint $table) {
            $table->id('id_etape')->index();
            $table->integer('ordre_etape')->index();
            $table->dateTime('date_passage');
            $table->foreignId('id_trajet')->index()->foreign()->references('id_trajet')->on('trajet');
            $table->foreignId('id_ville')->index()->foreign()->references('id_ville')->on('ville');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etape');
    }
};
