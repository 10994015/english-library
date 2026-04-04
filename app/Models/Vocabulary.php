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
        'srs_interval', 'srs_ease', 'srs_repetitions', 'srs_next_review',
    ];

    protected $casts = [
        'is_important' => 'boolean',
        'chinese_word'  => 'array',   // JSON 陣列，存放多個中文意思
        'srs_next_review' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function examResults()
    {
        return $this->hasMany(ExamResult::class, 'vocabulary_id');
    }
}
