<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $fillable = [
        'user_id',
        'vocabulary_id',
        'test_type',
        'is_correct',
        'user_answer',
        'language_type',
        'was_listening_mode',
    ];

    protected $casts = [
        'is_correct'          => 'boolean',
        'was_listening_mode'  => 'boolean',
    ];

    public function vocabulary()
    {
        return $this->belongsTo(Vocabulary::class, 'vocabulary_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
