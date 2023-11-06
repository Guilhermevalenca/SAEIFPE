<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FinishRegistrationController extends Controller
{
    public function index() {
        return Inertia::render('FinishRegistration');
    }
}
