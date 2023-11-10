<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersGraduates;
use App\Models\UsersStudying;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class FinishRegistrationController extends Controller
{
    public function index() {
        return Inertia::render('FinishRegistration');
    }
    public function storeStudent(Request $request)
    {
        $validation = $request->validate([
            'email_institution' => ['required', 'email'],
            'enrollment' => ['required','string'],
            'course' => ['required','string']
        ]);
        $validation['users_id'] = Auth::id();

        DB::beginTransaction();

        try {

            UsersStudying::create($validation);

            User::where('id', '=' , Auth::id())->update([
                'role' => 'student'
            ]);

        } catch (\Error $e) {
            DB::rollBack();
        }

        DB::commit();

        return redirect()->route('home');
    }
    public function storeGraduate(Request $request)
    {
        $validation = $request->validate([
            'course' => ['required', 'string'],
            'genre' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);
        $validation['users_id'] = Auth::id();
        //dd($validation);
        //return;
        DB::beginTransaction();

        try {

            UsersGraduates::create($validation);

            User::where('id', '=' , Auth::id())->update([
                'role' => 'graduate'
            ]);
        } catch (\Error $e) {
            DB::rollBack();
        }

        DB::commit();

        return redirect()->route('home');
    }
}
