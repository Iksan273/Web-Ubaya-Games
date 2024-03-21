@extends('layout.admin')


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <h2 class="text-center">Add Admin</h2><br>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label for="inputPosition" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPosition" name="name"
                               >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputCompany" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputCompany" name="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputCompany" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputCompany" name="password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Admin</button>
                </form>
            </div>

        </div>
    </div>
@endsection
