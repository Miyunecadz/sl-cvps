@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="border border-gray pt-4 pb-4 pl-5 pr-5 mt-5 rounded shadow-sm bg-white">
                        <center>
                            <h5 class="text-secondary text-p-info pt-2">Sytem User Login</h5>
                        </center>

                        <form action="" method="post" class="mt-3">
                            <div class="form-group">
                                <input type="text"  class="form-control mb-2" placeholder="Username">
                                <input type="password" class="form-control mb-2" placeholder="Password">
                                <select name="role" class="form-control">
                                    <option value="">Select role</option>
                                    <option value="2">Super Admin</option>
                                    <option value="1">Admin</option>
                                    <option value="3">Encoder</option>
                                </select>
                            </div>

                            <center>
                                <button class="btn btn-primary pb-2 mb-2 mt-1">Login</button>
                                <button class="btn btn-secondary pb-2 mb-2 mt-1">Cancel</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
