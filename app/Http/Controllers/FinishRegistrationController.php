<?php

namespace App\Http\Controllers;

use App\Http\Requests\finishRegistration\FinishRegistrationStoreGraduateRequest;
use App\Http\Requests\finishRegistration\FinishRegistrationStoreStudentRequest;
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
    public function storeStudent(FinishRegistrationStoreStudentRequest $request)
    {
        $validation = $request->validated();
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
    public function storeGraduate(FinishRegistrationStoreGraduateRequest $request)
    {
        $validation = $request->validated();
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
