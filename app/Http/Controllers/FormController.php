<?php

namespace App\Http\Controllers;

use App\Http\Resources\FormResource;
use App\Http\Resources\forms\QuestionsGetAllRelationsResource;
use App\Mail\FormEmail;
use App\Models\Form;
use App\Models\UsersGraduates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Illuminate\Mail\Mailables\Address;

class FormController extends Controller
{
    /**
     * Update the given blog derrota.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny',Form::class);

        $paginate = Form::where('user_id','=',Auth::id())->where('visible','=','1')
            ->orderByDesc('id')
            ->paginate(10);
        $forms = FormResource::collection($paginate);


        $response = [
            'forms' => $forms,
            'allPages' => $paginate->lastPage(),
            'current_page' => $paginate->currentPage(),
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
        $validation = $request->validate([
            'title' => ['required', 'string'],
            'questions' => ['required', 'array'],
            'questions.*.ask' => ['required', 'string'],
            'questions.*.responses' => ['nullable','array'],
            'questions.*.type' => ['required', 'in:unique,multiple,open-ended'],
            'questions.*.responses.*.text' => ['nullable','string','required_with:questions.*.responses'],
        ], [
            'title.required' => 'O nome do formulário é obrigatório.',
            'title.string' => 'O nome do formulário foi preenchido de forma incorreta.',
            'questions.required' => 'Pelo menos uma questão é necessária.',
            'questions.*.ask.required' => 'É necessário adicionar a pergunta.',
            'questions.*.ask.string' => 'A pergunta foi preenchida de forma incorreta.',
            'questions.*.responses.*.text.string' => 'A opção foi preenchida de forma incorreta.',
            'questions.*.responses.*.text.required_with' => 'É necessário preencher as opções',
            'questions.*.type.required' => 'O tipo de pergunta é obrigatório.',
            'questions.*.type.in' => 'O tipo de pergunta deve ser único, múltiplo ou aberto.'
        ]);
        $form->createForm($validation);
        return redirect()->route('forms_index');
    }
    public function edit($id, Form $form)
    {
        $form = $form->find($id);
        $questions = $form->questions()
            ->with('options')
            ->select('id','ask','type')
            ->get();

        $response = [
            'form' => new FormResource($form),
            'questions' => QuestionsGetAllRelationsResource::collection($questions)
        ];
        return Inertia::render('forms/adm/EditForm', [
            'data' => $response
        ]);
    }
    public function update(Request $request, Form $form)
    {
        $form->updateForm($request->input());
        return redirect()->route('forms_index');
    }
    public function createSendEmail($id)
    {
        return Inertia::render('forms/adm/SendFormByEmail', [
            'data' => Form::find($id)
        ]);
    }
    public function sendEmail(Request $request, $id)
    {
        $recipients = UsersGraduates::whereIn('course', $request->input('courses'))->with('users')->get();
        $data = [
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'form_id' => $id,
            'recipients' => []
        ];
        foreach ($recipients as $index => $value) {
            $data['recipients'][$index] = new Address($value['users']['email'], $value['users']['name']);
        }
        foreach ($request->input('newEmails') as $value) {
            $address = new Address($value, $value);
            array_push($data['recipients'], $address);
        }
        Mail::to(Auth::user(),Auth::getName())->send(new FormEmail($data));

    }
    public function destroy($id)
    {
        $form = Form::findOrFail($id);
        $form->update([
            'visible' => 0
        ]);
        return redirect()->route('forms_index');
    }
    public function searchByTitle(Request $request, Form $form)
    {
        $validate = $request->validate([
           'title' => ['required', 'string']
        ], [
            'title.required' => 'É necessário Digitar o titulo do formulário',
            'title.string' => 'É necessário digitar um valor valido para pesquisa'
        ]);
        $title = $validate['title'];
        $data = $form->where('title','LIKE',$title . '%')->paginate();
        return response($data, 200);
    }
}
