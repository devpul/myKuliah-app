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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();

            // foreign key 1
            $table->unsignedBigInteger('lecture_id')->nullable();
            $table->foreign('lecture_id')
                    ->references('id')->on('lectures')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->string('subject_name');
            $table->tinyInteger('semester');
            $table->tinyInteger('credits');
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
