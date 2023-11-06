<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    public function index()
    {
        return Inertia::render('Test');
    }
    public function create()
    {
        return Inertia::render('test/TestCreate');
    }
    public function store(Request $request, $id)
    {
        $response = [
            'data' => $request->input()
        ];
        return Inertia::render('Test', $response);
    }
}
