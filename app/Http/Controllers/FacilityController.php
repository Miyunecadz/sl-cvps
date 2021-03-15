<?php

namespace App\Http\Controllers;

use App\Classes\Facades\Security;
use App\Classes\Facades\User as FacadesUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Facility;
use App\Models\Municipality;

class FacilityController extends Controller
{
    private function getAllMunicipalities()
    {
        return Municipality::all();
    }

    public function index()
    {
        Security::checkIfAuthorized(auth()->user(),FacadesUser::ADMIN);
        return view('pages.admin.lists.facilities-lists',['facilities' => Facility::all()]);
    }

    public function create()
    {
        Security::checkIfAuthorized(auth()->user(),FacadesUser::ADMIN);
        return view('pages.admin.add-facility', [
            'user'=> 'Admin',
            'municipalities'=>$this->getAllMunicipalities()
        ]);
    }
    public function store(Request $request)
    {
        Security::checkIfAuthorized(auth()->user(),FacadesUser::ADMIN);
        $validator = Validator::make($request->all(), [
            'facility_name'         =>      'required',
            'municipality_id'          =>      'required',
        ]);

        if($validator->fails())
        {
            return redirect(route('facility.create'))->withErrors($validator)->withInput();
        }

        Facility::create([
            'facility_name' =>      $request->facility_name,
            'municipality_id'  =>      $request->municipality_id
        ]);

        return redirect(route('facility.create'))->with([
                'registered' => true,
                'title'      => 'Great!',
                'text'       => 'New facility area was added'
            ]);
    }
}
