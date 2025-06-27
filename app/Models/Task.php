<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'deadline',
        'priority',
        'status',
        'reminder_at',
        'is_recurring',
        'recurring_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
