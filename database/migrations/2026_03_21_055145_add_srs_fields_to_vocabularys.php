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
            $table->integer('srs_interval')->default(1);       // 下次複習間隔（天）
            $table->integer('srs_ease')->default(250);          // 難易度 x100
            $table->integer('srs_repetitions')->default(0);     // 連續答對次數
            $table->timestamp('srs_next_review')->nullable();   // 下次複習時間
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vocabularys', function (Blueprint $table) {
            //
        });
    }
};
