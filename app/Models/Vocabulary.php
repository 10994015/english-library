<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $table = 'vocabularys';

    protected $fillable = [
        'user_id',
        'english_word',
        'chinese_word',
        'part_of_speech',
        'example_sentence',
        'example_sentence_translation',
        'is_important',
        'language_type',
    ];

    protected $casts = [
        'is_important' => 'boolean',  // 確保布林值正確處理
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
