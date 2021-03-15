@extends('layouts.main')

@include('templates.navigation')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="table-responsive shadow-sm bg-white p-0 rounded border border-gray">

                <table class="table table-hover mb-0 pb-0">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <td class="border-bottom-0 border-top-0">ID</td>
                            <td class="border-bottom-0 border-top-0">FIRST NAME</td>
                            <td class="border-bottom-0 border-top-0">LAST NAME</td>
                            <td class="border-bottom-0 border-top-0">USERNAME</td>
                            <td class="border-bottom-0 border-top-0">MUNICIPALITY</td>
                            <td class="border-bottom-0 border-top-0" colspan="2">ACTIONS</td>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 100 !important;" class="text-secondary">
                        <tr class="border-bottom-1">
                            <td class="pt-2 pb-0">1</td>
                            <td class="pt-2 pb-0">Jun Vic</td>
                            <td class="pt-2 pb-0">Cadayona</td>
                            <td class="pt-2 pb-0">cadz@admin-slcvps</td>
                            <td class="pt-2 pb-0">Bontoc</td>
                            <td class="pt-2 pb-0" colspan="2">
                                <div class="d-flex justify-content-start">
                                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="" method="post">
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ml-1">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>      
</div>

@endsection