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
        Schema::create('vocabularys', function (Blueprint $table) {
            $table->id();
            //關聯user_id
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('english_word');
            $table->string('chinese_word');
            $table->string('part_of_speech')->nullable();
            $table->string('example_sentence')->nullable();
            $table->string('example_sentence_translation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vocabularys');
    }
};
