@extends('layouts.main')

@include('templates.navigation')

@section('content')

@if(Session::get('created') === true)
<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        icon: 'success',
        title: '{{ Session::get("title") }}',
        text: '{{ Session::get("text") }}',
        footer: ' '
    })
</script>
@endif

<div class="container mt-3 register">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="border border-gray pt-2 pb-3 pl-5 pr-5 mt-3 rounded text-center">
                <h4 class="text-primary mt-2 pt-1 text-content-heading">Vaccinator Registration</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="border border-gray pt-3 pb-4 pl-5 pr-5 mt-2 rounded">
                <small class="text-secondary text-p-info pt-2">Basic Information</small>

                <form action="{{ route('vaccinator.store') }}" method="post" class="mt-2">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <label class="text-secondary">Firstname <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="firstname" value="{{ old('firstname') }}" required>
                            @error('firstname')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">Lastname <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="lastname" value="{{ old('lastname') }}" required>
                            @error('lastname')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <label class="text-secondary">Middlename <small class="text-gray">(optional)</small></label>
                            <input type="text" class="form-control mb-1" name="middlename" value="{{ old('middlename') }}">
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">Suffix <small class="text-gray">(optional)</small></label>
                            <input type="text" class="form-control mb-1" name="suffix" value="{{ old('suffix') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <label class="text-secondary">Position <small class="text-danger">(required)</small></label>
                            <select name="position" class="form-control mb-1" required>
                                <option value="1"></option>
                            </select>
                            @error('position')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">Role <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="role" value="{{ old('role') }}" required>
                            @error('role')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <label class="text-secondary">Facility <small class="text-danger">(required)</small></label>
                            <select name="facility" class="form-control mb-1" required>
                                <option value="11"></option>
                            </select>
                            @error('facility')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <label class="text-secondary">PRC No <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control mb-1" name="prc" value="{{ old('prc') }}" required>
                            @error('prc')
                            <small class="text-danger" style="font-size: 12px !important;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <center class="mt-4">
                        <button type="submit" class="btn btn-primary pb-2">Register</button>
                        <button class="btn btn-secondary pb-2">Cancel</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection