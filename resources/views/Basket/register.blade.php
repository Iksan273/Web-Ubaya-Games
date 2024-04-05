@extends('Layout.user')

@section('title')
    Form Basket
@endsection
@include('Layout.header')
@section('content')

    <div class="container mt-5">
        <!-- Container Peraturan Pendaftaran -->
        <div class="registration-rules-container" style="background-color: rgba(245, 204, 131, 0.5); padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="color: white;">Tata Cara Pendaftaran</h3>
            <ol style="color: white; font-size: 20px;">
                <li>Download Formulir Pendaftaran di sini:
                    <!-- Button untuk download formulir -->
                    <a href="https://docs.google.com/document/d/1RGl4jhGGzoahKMHFir5oSAOhDkv-X4aS/edit?usp=drive_link" class="btn btn-primary" style="margin-top: 10px;">Download Formulir</a>
                </li>
                <!-- Tambahkan list lain di sini -->
                <li>Isi formulir dengan lengkap dan benar.</li>
                <li>Kumpulkan berkas pendaftaran pada form di bawah ini (dalam bentuk pdf).</li>

            </ol>
        </div>


        <!-- Form Daftar Badminton -->
        <h2>Form Daftar Basket</h2>
        <form action="{{ route('register.basket') }}" method="post" enctype="multipart/form-data">
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
                <p>File (PDF Only)</p>
               <button class="btn btn-primary"> <input type="file" class="form-control-file" id="file" name="file" required ></button>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

@endsection

