<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'note_date',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 