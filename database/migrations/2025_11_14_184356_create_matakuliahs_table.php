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
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->string('kode_mk')->primary();
            $table->string('nama_mk');
            $table->integer('sks');
            $table->string('semester');
            $table->unsignedBigInteger('waktu_id');
            $table->foreign('waktu_id')
                    ->references('waktu_id')->on('waktu')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->string('hari_id');
            $table->foreign('hari_id')
                    ->references('hari_id')->on('hari')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->string('ruangan_id');
            $table->foreign('ruangan_id')
                    ->references('ruangan_id')->on('ruangan')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->string('dosen_id');
            $table->foreign('dosen_id')
                    ->references('dosen_id')->on('dosen')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliahs');
    }
};
