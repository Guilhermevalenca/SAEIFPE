<?php

namespace App\Models;

use App\Models\forms\Options;
use App\Models\forms\Questions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Form extends Model
{
    use HasFactory;
    protected $fillable = ['title','user_id','visible'];

    public function createForm($data)
    {
        DB::beginTransaction();
        try {
            $form = $this->create([
                'title' => $data['title'],
                'user_id' => Auth::id()
            ]);
            foreach ($data['questions'] as $value) {

                $question = Questions::create([
                    'ask' => $value['ask'] . '',
                    'type' => $value['type'],
                    'form_id' => $form['id']
                ]);

                if($question['type'] !== 'open-ended') {

                    foreach ($value['responses'] as $elements) {
                        Options::create([
                            'descriptions' => $elements['text'],
                            'questions_id' => $question['id']
                        ]);
                    }

                }
            }
            DB::commit();
            return ['success' => true];
        } catch (\Error $e) {
            DB::rollBack();
            return ['success' => false, 'error' => $e];
        }
    }
    public function questions()
    {
        return $this->hasMany(Questions::class);
    }
}
