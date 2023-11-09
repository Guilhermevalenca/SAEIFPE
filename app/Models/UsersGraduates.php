<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersGraduates extends Model
{
    use HasFactory;
    protected $table = 'users_graduates';
    protected $fillable = ['course', 'genre', 'phone', 'users_id'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
