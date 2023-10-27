<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersAdm extends Model
{
    use HasFactory;
    protected $table = 'users_adm';
    protected $fillable = ['users_id'];
}
