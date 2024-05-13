@extends('Layout.user')

@section('title')
    Form Pengumpulan Komik
@endsection

@include('Layout.header')

@section('content')
    <div class="container mt-5">


        <!-- Form Pendaftaran Cerpen -->
        <h2>Form Pengumpulan Komik</h2>
        <form action="{{ route('pengumpulan.komik') }}" method="post" enctype="multipart/form-data">
            @csrf <!-- CSRF token is required for security -->
            <div class="form-group">
                <p>Nama</p>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <p>NRP</p>
                <input type="text" class="form-control" id="nrp" name="nrp" required>
            </div>
            <div class="form-group">
                <p>Kontingen</p>
                <input type="text" class="form-control" id="kontingen" name="kontingen" required>
            </div>
            <div class="form-group">
                <p>File (jpg/png/jpeg Only)</p>
               <button class="btn btn-primary"> <input type="file" class="form-control-file" id="file" name="file" required ></button>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
