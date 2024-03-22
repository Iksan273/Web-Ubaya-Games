@extends('layout.user')

@section('title')
    Form Badminton
@endsection
@include('layout.header')
@section('content')

    <div class="container mt-5">
        <h2>Form Daftar Futsal</h2>
        <form action="{{ route('register.badminton') }}" method="post" enctype="multipart/form-data">
            @csrf <!-- CSRF token is required for security -->
            <div class="form-group">
                <p>Nama Kontingen</p>
                <input type="text" class="form-control" id="nama_kontingen" name="nama_kontingen" required>
            </div>
            <div class="form-group">
                <p>Fakultas</p>
                <input type="text" class="form-control" id="fakultas" name="fakultas" required>
            </div>
            <div class="form-group">
                <p>File (PDF/Word)</p>
                <input type="file" class="form-control-file" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
