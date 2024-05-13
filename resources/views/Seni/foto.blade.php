@extends('Layout.user')

@section('title')
    Form Pengumpulan Foto
@endsection

@include('Layout.header')

@section('content')
    <div class="container mt-5">
        <!-- Form Pengumpulan Foto -->
        <h2>Form Pengumpulan Foto</h2>
        <form action="{{ route('pengumpulan.foto') }}" method="post" enctype="multipart/form-data">
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
            <h3>Foto Kategori Jurnalistik (Max 5)</h3>
            <div class="form-group">
                <button class="btn btn-warning">
                    <input type="file" name="foto1_kategori1" multiple class="form-control-file">
                </button>
            </div>
            <div class="form-group">
                <button class="btn btn-warning">
                    <input type="file" name="foto2_kategori1" multiple class="form-control-file">
                </button>
            </div>
            <div class="form-group">
                <button class="btn btn-warning">
                    <input type="file" name="foto3_kategori1" multiple class="form-control-file">
                </button>
            </div>
            <div class="form-group">
                <button class="btn btn-warning">
                    <input type="file" name="foto4_kategori1" multiple class="form-control-file">
                </button>
            </div>
            <div class="form-group">
                <button class="btn btn-warning">
                    <input type="file" name="foto5_kategori1" multiple class="form-control-file">
                </button>
            </div>

            <h3>Foto Kategori Seni Murni (Max 5)</h3>
            <div class="form-group">
                <button class="btn btn-secondary">
                    <input type="file" name="foto1_kategori2" multiple class="form-control-file">
                </button>
            </div>
            <div class="form-group">
                <button class="btn btn-secondary">
                    <input type="file" name="foto2_kategori2" multiple class="form-control-file">
                </button>
            </div>
            <div class="form-group">
                <button class="btn btn-secondary">
                    <input type="file" name="foto3_kategori2" multiple class="form-control-file">
                </button>
            </div>
            <div class="form-group">
                <button class="btn btn-secondary">
                    <input type="file" name="foto4_kategori2" multiple class="form-control-file">
                </button>
            </div>
            <div class="form-group">
                <button class="btn btn-secondary">
                    <input type="file" name="foto5_kategori2" multiple class="form-control-file">
                </button>
            </div>



            <!-- Input fields for foto kategori 1 -->


            <!-- Input fields for foto kategori 2 -->


            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
