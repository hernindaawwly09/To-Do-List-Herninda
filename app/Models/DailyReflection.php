<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReflection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'what_went_well',
        'what_to_improve',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
