<?php

namespace App\Http\Controllers;

use App\Models\Depositions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DepositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = [
            'data'=> Depositions::all()
        ];
//        return response($response, 200);
        return Inertia::render('depositions/Depositions',$response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'content'=>['required','string'],
            'picture'=>['nullable', 'string']
        ]);
        $validate['user_id'] = Auth::id();
        Depositions::create($validate);
        return redirect()->route('depoimentos_criar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Depositions $depositions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depositions $depositions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depositions $depositions)
    {
        //
    }
}
