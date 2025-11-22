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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();

            // foreign key 1
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id')
                    ->references('id')->on('subjects')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            // foreign key 2
            $table->unsignedBigInteger('lecture_id')->nullable();
            $table->foreign('lecture_id')
                    ->references('id')->on('lectures')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            // foreign key 3
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('schedules');
    }
};
