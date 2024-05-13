@extends('Layout.user')


@section('title')
    Berhasil
@endsection
@include('Layout.header')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <!-- Spotlight / Highlight Message -->
            <h1 class="display-4">Pengumpulan Anda Berhasil!</h1>
            <p class="lead">Selamat! Anda telah berhasil melakukan Pengumpulan Lomba. Silahkan menunggu info dan hasil dari panitia ya!.</p>

            <!-- Buttons -->
            <div class="mt-4">
                <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Kembali ke Home</a>

            </div>
        </div>
    </div>
</div>
@endsection


