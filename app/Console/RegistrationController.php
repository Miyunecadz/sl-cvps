<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use App\Models\Person;

class RegistrationController extends Controller
{
    public function view()
    {
        return view('pages.register');
                // ->with([
                //     'success'=> true, 
                //     'title'  => 'Great!', 
                //     'text'   => 'Registration was successful!'
                // ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category'       => 'required',
            'category_id'    => 'required',
            'category_id_num'=> 'required',
            'last_name'      => 'required',
            'first_name'     => 'required',
            'middle_name'    => 'required',
            'suffix'         => 'required',
            'contact_num'    => 'required|min:11|numeric',
            'loc_region'     => 'required',
            'loc_prov'       => 'required',
            'loc_muni'       => 'required',
            'loc_brgy'       => 'required',
            'sex'            => 'required',
            'birth_date'     => 'required'
        ]);

        if($validator->fails())
        {
            return redirect(route('person.register'))
                    ->withErrors([
                        'category'       => 'Please select category',
                        'category_id'    => 'Please enter category ID',
                        'category_id_num'=> 'Please enter category ID number',
                        'lastname'       => 'Please enter last name',
                        'firstname'      => 'Please enter first name',
                        'contact_num'    => 'Please provide working contact number',
                        'loc_region'     => 'Please enter residence region',
                        'loc_prov'       => 'Please enter residence province',
                        'loc_muni'       => 'Please enter residence municipality',
                        'loc_brgy'       => 'Please enter residence barangay',
                        'sex'            => 'Please select gender',
                        'birth_date'     => 'Please specify your birthdate',
                    ])
                    ->withInput();
        }
        
        $date = new DateTime($request->birth_date);
        Person::create([
            'category'       => $request->category,
            'category_id'    => $request->category_id,
            'category_id_num'=> $request->category_id_num,
            'philhealth_id'  => $request->philhealth_id,
            'pwd_id'         => $request->pwd_id,
            'lastname'       => $request->lastname,
            'firstname'      => $request->firstname,
            'middlename'     => $request->middlename,
            'suffix'         => $request->suffix,
            'contact_num'    => $request->contact_num,
            'loc_region'     => $request->loc_region,
            'loc_prov'       => $request->loc_prov,
            'loc_muni'       => $request->loc_muni,
            'loc_brgy'       => $request->loc_brgy,
            'sex'            => $request->sex,
            'birth_date'     => $date->format('Y-m-d')
        ]);

        return back(route('person.register'))
                ->with([
                    'registered'=> true,
                    'title'     => 'Great!',
                    'message'   => 'Registration went through successfully. Thank you!'
                ])->withInput();
    }
}
