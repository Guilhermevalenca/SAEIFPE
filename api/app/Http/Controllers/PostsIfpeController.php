<?php

namespace App\Http\Controllers;

use App\Http\Resources\postsIfpeResource;
use App\Models\postsIfpe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostsIfpeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return postsIfpeResource::collection(postsIfpe::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => ['required','string'],
            'content' => ['required','string'],
            'send_to' => ['required','array'],
            'user_id' => $request->user()['id']
        ]);
        return response($validation, 200);
        if($validation) {

            try {
                $post = postsIfpe::create($validation);
                return response($post,201);
            } catch (\Error $e) {
                return response(['error' => $e],400);
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
