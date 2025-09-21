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
        Schema::table('vocabularys', function (Blueprint $table) {
            // 新增是否重點欄位
            $table->boolean('is_important')->default(false)->comment('是否為重點單字');
            // 新增語言類型欄位
            $table->string('language_type')->default('english')->comment('語言類型，如：english, japanese, korean等');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vocabularys', function (Blueprint $table) {
            $table->dropColumn(['is_important', 'language_type']);
        });

    }
};
