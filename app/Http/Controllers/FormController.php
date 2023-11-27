<?php

namespace App\Http\Controllers;

use App\Http\Requests\form\FormsRequest;
use App\Http\Requests\form\FormsSearchByTitleRequest;
use App\Http\Resources\FormResource;
use App\Http\Resources\forms\QuestionsGetAllRelationsResource;
use App\Mail\FormEmail;
use App\Models\Form;
use App\Models\forms\Responses;
use App\Models\UsersGraduates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Illuminate\Mail\Mailables\Address;
use function Termwind\render;

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
    public function store(FormsRequest $request, Form $form)
    {
        $validation = $request->validated();
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
            'questions' => QuestionsGetAllRelationsResource::collection($questions),
            'answered' => Responses::where('forms_id', '=' , $id)->count() >= 1
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
        Form::destroy($id);
        return redirect()->route('forms_index');
    }
    public function searchByTitle(FormsSearchByTitleRequest $request, Form $form)
    {
        $validate = $request->validated();
        $title = $validate['title'];
        $data = $form->where('title','LIKE',$title . '%')->get();
        return response($data, 200);
    }
    public function copyForm(FormsRequest $request, Form $form)
    {
        $validation = $request->validated();
        $result = $form->createForm($validation);
        return redirect()->route('forms_edit', ['id' => $result['form']['id']]);
    }
    public function copyFormById(Form $form, $id)
    {
        $formData = $form->find($id);
        $formData['title'] = 'copia de ' . $formData['title'];
        $formData['questions'] = $formData
            ->questions()
            ->with('options')
            ->select('id','ask','type')
            ->get();
        $result = $form->createForm($formData);
        return redirect()->route('forms_edit', ['id' => $result['form']['id']]);
    }
}
