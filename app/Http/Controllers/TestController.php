<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    public function index()
    {
        return Inertia::render('Test');
    }
    public function store(Request $request)
    {
        dd($request->file());
        return;
//        $validation = $request->validate([
//            'name' => ['required','string'],
//            'cpf' => ['required','string','unique:users,cpf'],
//            'phones' => ['required','array'],
//            'phones.*' => ['required', 'string']
//        ], [
//            'cpf.required' => 'É necessário preencher seu cpf',
//            'cpf.unique' => 'cpf já cadastrado',
//            'phones.*.string' => 'Ta errado karai!!!'
//        ]);
//        return back()->withErrors(['hello' => 'deu merda']);
    }
}
