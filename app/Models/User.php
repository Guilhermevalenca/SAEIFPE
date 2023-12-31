<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'cpf',
        'password',
        'role',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function role($id)
    {
        $testingAdm = UsersAdm::where('users_id','=',$id)->get()->count();
        if($testingAdm >= 1) {
            return 'adm';
        }

        $testingGraduates = UsersGraduates::where('users_id','=',$id)->get()->count();
        if($testingGraduates >= 1) {
            return 'graduate';
        }

        $testingStudying = UsersStudying::where('users_id','=',$id)->get()->count();
        if($testingStudying >= 1) {
            return 'studying';
        }
        return 'other';
    }
    public function adm(): HasOne
    {
        return $this->hasOne(UsersAdm::class, 'users_id');
    }
    public function graduate(): HasOne
    {
        return $this->hasOne(UsersGraduates::class, 'users_id');
    }
    public function student(): HasOne
    {
        return $this->hasOne(UsersStudying::class, 'users_id');
    }
}
