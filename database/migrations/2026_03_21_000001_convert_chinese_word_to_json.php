<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. 新增暫時欄位
        Schema::table('vocabularys', function (Blueprint $table) {
            $table->json('chinese_word_new')->nullable();
        });

        // 2. 把舊資料轉換（字串 → 陣列）
        DB::table('vocabularys')->get()->each(function ($vocab) {
            DB::table('vocabularys')
                ->where('id', $vocab->id)
                ->update([
                    'chinese_word_new' => json_encode([$vocab->chinese_word]),
                ]);
        });

        // 3. 刪除舊欄位，把新欄位改名
        Schema::table('vocabularys', function (Blueprint $table) {
            $table->dropColumn('chinese_word');
        });

        Schema::table('vocabularys', function (Blueprint $table) {
            $table->renameColumn('chinese_word_new', 'chinese_word');
        });
    }

    public function down(): void
    {
        // 1. 新增暫時字串欄位
        Schema::table('vocabularys', function (Blueprint $table) {
            $table->string('chinese_word_temp')->nullable();
        });

        // 2. 取 JSON 陣列第一個值還原回字串
        DB::table('vocabularys')->get()->each(function ($vocab) {
            $meanings = json_decode($vocab->chinese_word, true);
            DB::table('vocabularys')
                ->where('id', $vocab->id)
                ->update([
                    'chinese_word_temp' => $meanings[0] ?? '',
                ]);
        });

        // 3. 刪除 JSON 欄位，把暫時欄位改名
        Schema::table('vocabularys', function (Blueprint $table) {
            $table->dropColumn('chinese_word');
        });

        Schema::table('vocabularys', function (Blueprint $table) {
            $table->renameColumn('chinese_word_temp', 'chinese_word');
        });
    }
};
