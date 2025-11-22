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
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();

            // foreign key 1
            $table->unsignedBigInteger('document_id')->nullable();
            $table->foreign('document_id')
                    ->references('id')->on('documents')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            // foreign key 2
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['doing', 'done'])->default('doing');
            $table->enum('priority', ['low','medium' ,'high']);
            $table->dateTime('due_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todolists');
    }
};
