@extends('layout.user')


@section('title')
    Berhasil Register
@endsection
@include('layout.header')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <!-- Spotlight / Highlight Message -->
            <h1 class="display-4">Pendaftaran Anda Berhasil!</h1>
            <p class="lead">Selamat! Anda telah berhasil melakukan pendaftaran. Silakan cek status pendaftaran Anda untuk informasi lebih lanjut.</p>

            <!-- Buttons -->
            <div class="mt-4">
                <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Kembali ke Home</a>
                <a href="{{ url('/status-pendaftaran') }}" class="btn btn-success btn-lg">Lihat Status Pendaftaran</a>
            </div>
        </div>
    </div>
</div>
@endsection


