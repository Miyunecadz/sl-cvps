<?php

namespace App\Http\Controllers;

class VaccinatorRegistrationController extends Controller
{
    public function create()
    {

        return view('pages.admin.add-encoder', ['user' => 'Admin']);
    }
}
