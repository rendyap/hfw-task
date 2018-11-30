@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ strtoupper(auth()->user()->name) }} Dashboard</div>

                <div class="card-body">

                    @role ('admin')
                        Hi.. Admin!! You have permissions to do many things, like : <br>
                        <button class="btn btn-success">Company Files</button>
                        <button class="btn btn-warning">Manager Files</button>
                        <button class="btn btn-primary">Staff Files</button>

                    @else
                        You are not an ADMIN!! You only have 1 permission : <br>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-success">Get Out From This Page</button>
                        </form>

                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
