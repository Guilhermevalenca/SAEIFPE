<?php

namespace App\Models;

use App\Models\Scopes\GlobalScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use Illuminate\Database\Eloquent\Relations\HasOne;

class PostsIfpe extends Model
{
    use HasFactory;
    protected $table = 'posts_ifpe';
    protected $fillable = ['title','content','send_to','user_id','visible', 'form_id', 'img', 'links'];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
