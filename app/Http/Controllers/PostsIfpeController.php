<?php

namespace App\Http\Controllers;

use App\Http\Requests\posts\PostsIfpeStoreRequest;
use App\Http\Requests\posts\PostsIfpeUpdateRequest;
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
        $pagination = $pagination->with('form')->orderByDesc('id')->paginate(5);
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
    public function store(PostsIfpeStoreRequest $request)
    {
        $validation = $request->validated();
        if($validation) {
            $validation['user_id'] = Auth::id();
            $validation['send_to'] = is_null($validation['send_to']) ? json_encode(['all']) : json_encode($validation['send_to']);

            if(array_key_exists('img', $validation)) {
                //montando img em string:
                $binary = file_get_contents($validation['img'][0]->getRealPath());
                $dataImg = [
                    'base64' => base64_encode($binary),
                    'mimeType' => $validation['img'][0]->getMimeType()
                ];
                $validation['img'] = 'data:' . $dataImg['mimeType'] . ';base64,' . $dataImg['base64'];
            }
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

    public function edit($id)
    {
        $post = PostsIfpe::with('form')->find($id);
        $post['send_to'] = json_decode($post['send_to']);
        return Inertia::render('posts/EditPosts', [
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsIfpeUpdateRequest $request, $id)
    {
        $validation = $request->validated();

        $img = $request->file('img');
        if($img) {
            $binary = file_get_contents($img->getRealPath());
            $dataImg = [
                'base64' => base64_encode($binary),
                'mimeType' => $img->getMimeType()
            ];
            $validation['img'] = 'data:' . $dataImg['mimeType'] . ';base64,' . $dataImg['base64'];
        }
        PostsIfpe::where('id', '=', $id)->update($validation);
        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(postsIfpe $postsIfpe)
    {
        //
    }
}
