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
        Schema::create('exam_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vocabulary_id')->constrained('vocabularys')->onDelete('cascade');
            $table->string('test_type');           // en_to_zh / zh_to_en
            $table->boolean('is_correct');
            $table->string('user_answer')->nullable();
            $table->string('language_type')->default('english');
            $table->boolean('was_listening_mode')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_results');
    }
};
