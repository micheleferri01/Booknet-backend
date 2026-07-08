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
        Schema::table('books', function (Blueprint $table){
            $table->dropForeign(['author_id']);
            $table->dropForeign(['editor_id']);
        });

        Schema::table('books', function (Blueprint $table){
            $table->foreignId('author_id')->nullable()->change();
            $table->foreignId('editor_id')->nullable()->change();
        });

        Schema::table('books', function (Blueprint $table){
            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->cascadeOnDelete();

            $table->foreign('editor_id')
                ->references('id')
                ->on('editors')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('author_id')
                ->nullable(false)
                ->change();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('author_id')
                ->references('id')
                ->on('authors');
        });
    }
};
