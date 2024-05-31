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
        Schema::create('releve_kilo', function (Blueprint $table) {
            $table->id('id_releve');
            $table->decimal('kilometrage', 8, 2);
            $table->unsignedTinyInteger('month');
            $table->year('year');
            $table->foreignId('id_vehicule');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('releve_kilo');
    }
};
