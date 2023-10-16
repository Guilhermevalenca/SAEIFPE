<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostsIfpeResource;
use App\Models\postsIfpe;
use Illuminate\Http\Request;

class PostsIfpeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostsIfpeResource::collection(postsIfpe::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => ['required','string'],
            'content' => ['required','string'],
            'send_to' => 'required'
        ]);
        if($validation) {
            $validation['user_id'] = $request->user()->id;
            $validation['send_to'] = json_encode($validation['send_to']);
            try {
                postsIfpe::create($validation);
                return response(['success' => true],201);
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
