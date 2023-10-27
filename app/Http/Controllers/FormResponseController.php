<?php

namespace App\Http\Controllers;

use App\Http\Resources\FormResource;
use App\Http\Resources\forms\FormResponseResource;
use App\Http\Resources\forms\FormResponseTwoResource;
use App\Models\Form;
use App\Models\forms\Options;
use App\Models\forms\Responses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormResponseController extends Controller
{
    public function index()
    {
        $paginate = Form::where('visible','=','1')->paginate();
        $forms = FormResponseTwoResource::collection($paginate);

        $response = [
            'forms' => $forms,
            'allPages' => $paginate->lastPage()
        ];
        return response($response,200);
    }
    public function store(Request $request)
    {
        $ids = [];
        $user_id = Auth::id();
        $form_response = [];
        foreach ($request->input() as $index => $value) {
            foreach ($value['selected_responses'] as $id) {
                array_push($ids,$id);
            }
            array_push($form_response, $value);
            $form_response[$index]['users_id'] = $user_id;
            $form_response[$index]['selected_responses'] = json_encode($form_response[$index]['selected_responses']);
        }

        $result = Options::whereIn('id',$ids)->count();

        if($result !== count($ids)) {
            throw new \Exception("tem algo errado ai");
        } else {

            $response = [];

            foreach ($form_response as $values) {
                array_push($response, Responses::create($values));
            }

            return response(['success' => true, 'data' => $response], 200);

        }

    }
    public function showByFormId($id)
    {
        $questions = Responses::where('forms_id','=',$id)->get()->groupBy('questions_id');
        $response['form'] = new FormResource(Form::find($id));
        $response['questions'] = [];

        foreach ($questions as $question) {
            array_push($response['questions'],FormResponseResource::collection($question));
        }
        return response($response, 200);
    }
}
