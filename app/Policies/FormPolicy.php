<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FormPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function index()
    {
        return true;
    }
}
