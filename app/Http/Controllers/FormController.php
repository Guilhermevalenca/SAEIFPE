<?php

namespace App\Http\Controllers;

use App\Http\Resources\FormResource;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $paginate = Form::where('user_id','=',Auth::id())->where('visible','=','1')->paginate();
        $forms = FormResource::collection($paginate);

        $response = [
            'forms' => $forms,
            'allPages' => $paginate->lastPage()
        ];
        return response($response,200);
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
        return response($response, 200);
    }
    public function store(Request $request, Form $form)
    {
        return response($form->createForm($request->input()), 201);
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
        return response(['success' => true,],200);
    }
}
