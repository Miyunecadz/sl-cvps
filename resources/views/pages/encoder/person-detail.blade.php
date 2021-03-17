@extends('layouts.main')

@section('content')
    <div class="container">
        @include('templates.form-heading-UI')

        <div class="row mt-3">
            <div class="col-md-6">
                <h5 class="text-secondary mt-3">ACTS Data</h5>
                <div class="card shadow-sm pt-3 px-3">
                    <p>First name : <span class="text-primary">{{ $actspersondatas[0]['first_name'] }}</span></p>
                    <p>Middle name: <span class="text-primary">{{ $actspersondatas[0]['middle_name'] }}</span></p>
                    <p>Last name  : <span class="text-primary">{{ $actspersondatas[0]['last_name'] }}</span></p>
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="text-secondary mt-3">Pre-Registered Data</h5>
                <div class="card shadow-sm pt-3 px-3">
                    <p>First name : <span class="text-primary">{{ $persondatas['firstname'] }}</span></p>
                    <p>Middle name: <span class="text-primary">{{ $persondatas['middlename'] }}</span></p>
                    <p>Last name  : <span class="text-primary">{{ $persondatas['lastname'] }}</span></p>
                </div>
            </div>
        </div>

        <form action="{{ route('qr.add') }}" method="post" class="mt-2">
            @csrf
            <input type="hidden" name="person_id" value="{{ $persondatas['id'] }}">
            <input type="hidden" name="qrcode_number" value="{{ $actspersondatas[0]['qr_code'] }}">
            <button type="submit" class="btn btn-primary"> <i data-feather="check" class="pt-1 pb-1"></i> Accept &nbsp;</button>
            <a href="" class="btn btn-secondary"><i data-feather="x" class="pt-1 pb-1"></i> Cancel &nbsp;</a>
        </form>
    </div>
@endsection



