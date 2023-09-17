<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \App\Http\Controllers\AuthController;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //name, cpf, password, email, registration, genre
        $validation = $request->validate([
            'name' => 'required',
            'cpf' => ['required','numeric'],
            'email' => ['required','email'],
            'registration' => ['nullable'],
            'genre' => ['nullable'],
            'password' => ['required','min:6'],
        ]);
        try {
            User::create($validation);
            $auth = new AuthController();
            return $auth->login($request, 201);
        } catch (\Error $e) {
            return $e;
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
