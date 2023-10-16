<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request, $status = 200)
    {
        if(Auth::attempt($request->only('cpf','password'))) {
            $user = $request->user();
            //Usuários comuns pelo fato de serem alunos completando cadastros
            $token = $request->user()->createToken('user-common',[$user['user_category']]);
            $response = [
                'token' => $token->plainTextToken,
                'success' => true
            ];
            return response($response, $status);
        }
        return response(['success' => false],401);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response(['success' => true],200);
    }
    public function me(Request $request)
    {
        $response = [
            'user' => $request->user(),
            'success' => true
        ];
        return response($response,200);
    }
}
