<?php

namespace App\Models;

use App\Models\Scopes\GlobalScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Depositions extends Model
{
    use HasFactory;
    protected $fillable = ['content','picture','user_id', 'approved'];

//    protected static function boot()
//    {
//        parent::boot();
//        static::addGlobalScope(new GlobalScope());
//    }
}
