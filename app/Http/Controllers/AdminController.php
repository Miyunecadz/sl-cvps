<?php

namespace App\Http\Controllers;

use App\Classes\Facades\Security;
use App\Classes\Facades\User as FacadesUser;

use App\Models\Municipality;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getMunicipalities()
    {
        return Municipality::all();
    }

    public function index()
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        $user = User::where('role', '1')->paginate(5);
        return view('pages.superadmin.admin-lists')->with('users', $user);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */

    public function create()
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
    
        return view('pages.superadmin.add-admin',[
            'user'=>FacadesUser::ADMIN,
            'municipalities'=>$this->getMunicipalities()
        ]);
    }

    public function view()
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        return view('pages.admin.admin-lists');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     private function passwordCheck($password, $confirm_password)
     {
        if($password !== $confirm_password)
        {
            return true;
        }
     }


    public function store(Request $request)
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        
        $validator = Validator::make($request->all(), [
            'first_name'            =>      'required',
            'last_name'             =>      'required',
            'username'              =>      'required|unique:users,username',
            'password'              =>      'required|min:4',
            'confirm_password'      =>      'required',
            'municipality'          =>      'required',
        ]);

        if($validator->fails())
        {
            return redirect(route('admin.create'))->withErrors($validator)->withInput();
        }

        if($this->passwordCheck($request->password, $request->confirm_password))
        {
            return redirect(route('admin.create'))->with([
                    'matched'  => false,
                    'title'    => 'Warning!',
                    'text' => 'Password does not match'
                ])->withInput();
        }


        User::create([
            'first_name'    =>      Str::title($request->first_name),
            'last_name'     =>      Str::title($request->last_name),
            'username'      =>      $request->username,
            'password'      =>      bcrypt($request->password),
            'municipality_id'  =>      $request->municipality,
            'role'          =>      FacadesUser::ADMIN
        ]);
        return redirect(route('admin.create'))->with([
                'registered' => true,
                'title'      => 'Great!',
                'text'       => 'New admin account added'
            ]);
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        return view('pages.admin.edit-forms.admin',[
            'municipalities'=>$this->getMunicipalities(),
            'admin'=>$admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        Validator::make($request->all(), [
        'first_name'            =>      'required',
        'last_name'             =>      'required',
        'municipality_id'          =>      'required',
        ])->validate();

        $admin->update($request->all());
        
        return redirect(route('admin.edit',$admin))->with([
            'registered' => true,
            'title'      => 'Great!',
            'text'       => 'Admin account updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auth::user()->allowIf(FacadesUser::SUPER_ADMIN);
        try
        {
            $user = User::findOrFail($id);

            $user->delete();

            return redirect(route('admin.index'))->with('message', 'User successfully deleted');
        }
        catch(ModelNotFoundException $e)
        {
            abort(400);
        }



    }
}
