<?php

namespace App\Models\forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    use HasFactory;
    protected $table = 'forms_responses';
    protected $fillable = ['users_id', 'forms_id', 'questions_id', 'selected_responses', 'open_ended_responses'];
}
