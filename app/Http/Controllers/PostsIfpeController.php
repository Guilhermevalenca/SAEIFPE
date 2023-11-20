<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostsIfpeResource;
use App\Models\PostsIfpe;
use App\Models\UsersGraduates;
use App\Models\UsersStudying;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostsIfpeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PostsIfpe $postsIfpe)
    {
        if(Auth::check()) {
            $user = Auth::user();

            if( is_null($user['role']) ) {
                $pagination = $postsIfpe
                    ->whereJsonContains('send_to','all')
                    ->with('user');

            } else {
                if($user['role'] === 'adm') {

                    $pagination = PostsIfpe::with('user');

                } else {

                    if($user['role'] === 'graduate') {

                        $userGraduate = UsersGraduates::where('users_id','=',$user['id'])->get();
//                        dd($userGraduate[0]['course']);
                        $pagination = PostsIfpe::with('user')
                            ->whereJsonContains('send_to','all')
                            ->orWhereJsonContains('send_to',$userGraduate[0]['course']);

                    } else if($user['role'] === 'student') {

                        $userStudent = UsersStudying::where('users_id','=',$user['id'])->get();
                        $pagination = PostsIfpe::with('user')
                            ->whereJsonContains('send_to','all')
                            ->orWhereJsonContains('send_to',$userStudent[0]['course']);

                    }

                }

            }

        } else {

            $pagination = PostsIfpe::with('user')
                ->whereJsonContains('send_to','all');

        }
        $pagination = $pagination->orderByDesc('id')->paginate(5);
        $data = PostsIfpeResource::collection($pagination->items());
        $last_page = $pagination->lastPage();
        $current_page = $pagination->currentPage();
        return Inertia::render('posts/PostsIfpe', [
            'data' => $data,
            'last_page' => $last_page,
            'current_page' => $current_page
        ]);
    }

    public function create()
    {
        return Inertia::render('posts/CreatePosts');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => ['required','string'],
            'content' => ['required','string'],
            'send_to' => ['nullable', 'array', 'in:ADM,IPI,LOG,TGQ,TSI'],
            'form_id' => ['nullable', 'exists:forms,id'],
            'img.0' => ['nullable', 'image']
        ],[
            'title.required' => 'Você precisa adicionar um titulo',
            'title.string' => 'Você adicionou um valor inválido',
            'content.required' => 'É necessário adicionar algum conteúdo',
            'content.string' => 'Você adicionou um valor inválido',
            'send_to.array' => 'Valor inválido',
            'send_to.in' => 'Você adicionou um valor errado',
            'form_id.exists' => 'Você precisa adicionar um formulário valido'
        ]);
        if($validation) {
            $validation['user_id'] = Auth::id();
            $validation['send_to'] = is_null($validation['send_to']) ? json_encode(['all']) : json_encode($validation['send_to']);

            //montando img em string:
            $binary = file_get_contents($validation['img'][0]->getRealPath());
            $dataImg = [
                'base64' => base64_encode($binary),
                'mimeType' => $validation['img'][0]->getMimeType()
            ];
            $validation['img'] = 'data:' . $dataImg['mimeType'] . ';base64,' . $dataImg['base64'];

            try {
                PostsIfpe::create($validation);
                return redirect()->route('home');
            } catch (\Error $e) {
                dd($e);
            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(postsIfpe $postsIfpe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, postsIfpe $postsIfpe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(postsIfpe $postsIfpe)
    {
        //
    }
}
