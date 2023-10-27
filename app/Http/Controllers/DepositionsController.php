<?php

namespace App\Http\Controllers;

use App\Models\Depositions;
use Illuminate\Http\Request;

class DepositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response =[
            'depositions'=> Depositions::all(),
            'success' => true
        ];
        return response($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'content'=>['required','string'],
            'picture'=>['nullable', 'string'],
            'school' =>['required','string'],
        ]);
        $response = [
            'deposition'=> Depositions::create($validate),
            'success'=> true
        ];
        return response($response,201);
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
