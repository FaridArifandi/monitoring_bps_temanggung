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
        Schema::create('dash_monitorings', function (Blueprint $table) {
            $table->id(); //(Primary Key)
            $table->unsignedBigInteger('tim_kerja_id');
            $table->integer('target');
            $table->integer('realisasi');
            $table->timestamps();
            $table->foreign('tim_kerja_id')->references('id')->on('tim_kerjas')->onDelete('cascade'); // Foreign key to tim_kerja
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dash_monitorings');
    }
};
