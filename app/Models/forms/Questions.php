<?php

namespace App\Models\forms;

use App\Models\Form;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questions extends Model
{
    use HasFactory;
    protected $table = 'forms_questions';
    protected $fillable = ['ask', 'type', 'form_id'];

    public function Form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }
    public function options(): HasMany
    {
        return $this->hasMany(Options::class);
    }
}
