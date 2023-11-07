<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersStudying extends Model
{
    use HasFactory;
    protected $table = 'users_studying';
    protected $fillable = ['email_institution', 'enrollment', 'course', 'users_id'];
}
