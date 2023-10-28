<?php

namespace App\Http\Controllers;

use App\Http\Resources\FormResource;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FormController extends Controller
{
    public function index()
    {
        $paginate = Form::where('user_id','=',Auth::id())->where('visible','=','1')->paginate(50);
        $forms = FormResource::collection($paginate);

        $response = [
            'forms' => $forms,
            'allPages' => $paginate->lastPage()
        ];
        return Inertia::render('forms/FormsAdm', [
            'data' => $response
        ]);
    }
    public function show($id, Form $form)
    {
        $form = $form->find($id);
        $questions = $form->questions()
            ->with('options')
            ->select('id','ask','type')
            ->get();

        $response = [
            'form' => new FormResource($form),
            'questions' => $questions
        ];
        return Inertia::render('forms/adm/SeeFormCreated', [
            'data' => $response
        ]);
    }
    public function store(Request $request, Form $form)
    {
        $form->createForm($request->input());
        return redirect()->route('forms_index');
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {
        $form = Form::findOrFail($id);
        $form->update([
            'visible' => 0
        ]);
        return redirect()->route('forms_index');
    }
}
