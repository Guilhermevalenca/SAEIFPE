<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersAdm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Nette\Schema\ValidationException;
use function Laravel\Prompts\error;

class AdmController extends Controller
{
    public function index()
    {
        return Inertia::render('Adm');
    }
    public function newAdm(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = User::where('cpf','=',$request->input('cpf'))->get();

            if($user->count() > 0) {
                User::where('id', '=' , $user[0]['id'])->update([
                    'role' => 'adm'
                ]);
                UsersAdm::create([
                    'users_id' => $user[0]['id']
                ]);
            } else {
                return back()->withErrors(['cpf' => 'cpf invalido ou não existe']);
            }
        } catch (\Error $e) {
            DB::rollBack();

            return back()->withErrors(['cpf' => 'cpf invalido ou não existe']);
        }

        DB::commit();

        return redirect()->route('adm_index');
    }
}
