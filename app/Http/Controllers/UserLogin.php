<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserLogin extends Controller
{
    public function view()
    {
        return view('pages.login');
    }
}