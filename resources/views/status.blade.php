@extends('layout.user')
@section('title')
    Status Pendaftaran
@endsection
@include('layout.header')
@section('content')
@section('content')
<div class="container mt-5">

    <!-- Tabel Voli -->
    <div class="card mb-5">
        <div class="card-body">
            <h2 class="text-center mb-3 text-dark">Cabang Voli</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color: #181819; color: #FFFFFF;">
                        <tr>
                            <th>Nama Kontingen</th>
                            <th>Fakultas</th>
                            <th>Status</th>
                            <th>Revisi</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($voli as $data)
                            <tr>
                                <td>{{ $data->nama_kontingen }}</td>
                                <td>{{ $data->fakultas }}</td>
                                <td>
                                    <span class="badge {{ $data->status == 'pending' ? 'bg-primary' : ($data->status == 'accepted' ? 'bg-success' : 'bg-danger') }}">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </td>
                                <td>{{ $data->revisi }}</td>
                                <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tabel Basket -->
    <div class="card mb-5">
        <div class="card-body">
            <h2 class="text-center mb-3 text-dark">Cabang Basket</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color: #1565C0; color: #FFFFFF;">
                        <tr>
                            <th>Nama Kontingen</th>
                            <th>Fakultas</th>
                            <th>Status</th>
                            <th>Revisi</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($basket as $data)
                            <tr>
                                <td>{{ $data->nama_kontingen }}</td>
                                <td>{{ $data->fakultas }}</td>
                                <td>
                                    <span class="badge {{ $data->status == 'pending' ? 'bg-primary' : ($data->status == 'accepted' ? 'bg-success' : 'bg-danger') }}">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </td>
                                <td>{{ $data->revisi }}</td>
                                <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <!-- Tabel Futsal -->
     <div class="card mb-5">
        <div class="card-body">
            <h2 class="text-center mb-3 text-dark">Cabang Futsal</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color: #d51b17; color: #FFFFFF;">
                        <tr>
                            <th>Nama Kontingen</th>
                            <th>Fakultas</th>
                            <th>Status</th>
                            <th>Revisi</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($futsal as $data)
                            <tr>
                                <td>{{ $data->nama_kontingen }}</td>
                                <td>{{ $data->fakultas }}</td>
                                <td>
                                    <span class="badge {{ $data->status == 'pending' ? 'bg-primary' : ($data->status == 'accepted' ? 'bg-success' : 'bg-danger') }}">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </td>
                                <td>{{ $data->revisi }}</td>
                                <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <!-- Tabel badminton -->
     <div class="card mb-5">
        <div class="card-body">
            <h2 class="text-center mb-3 text-dark">Cabang Badminton</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color: #44b75d; color: #FFFFFF;">
                        <tr>
                            <th>Nama Kontingen</th>
                            <th>Fakultas</th>
                            <th>Status</th>
                            <th>Revisi</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($badminton as $data)
                            <tr>
                                <td>{{ $data->nama_kontingen }}</td>
                                <td>{{ $data->fakultas }}</td>
                                <td>
                                    <span class="badge {{ $data->status == 'pending' ? 'bg-primary' : ($data->status == 'accepted' ? 'bg-success' : 'bg-danger') }}">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </td>
                                <td>{{ $data->revisi }}</td>
                                <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
     <!-- Tabel dance -->
     <div class="card mb-5">
        <div class="card-body">
            <h2 class="text-center mb-3 text-dark">Cabang Dance</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color: #cb2d9f; color: #FFFFFF;">
                        <tr>
                            <th>Nama Kontingen</th>
                            <th>Fakultas</th>
                            <th>Status</th>
                            <th>Revisi</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dance as $data)
                            <tr>
                                <td>{{ $data->nama_kontingen }}</td>
                                <td>{{ $data->fakultas }}</td>
                                <td>
                                    <span class="badge {{ $data->status == 'pending' ? 'bg-primary' : ($data->status == 'accepted' ? 'bg-success' : 'bg-danger') }}">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </td>
                                <td>{{ $data->revisi }}</td>
                                <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
      <!-- Tabel esport -->
      <div class="card mb-5">
        <div class="card-body">
            <h2 class="text-center mb-3 text-dark">Cabang Esport</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color: #e2801f; color: #FFFFFF;">
                        <tr>
                            <th>Nama Kontingen</th>
                            <th>Fakultas</th>
                            <th>Status</th>
                            <th>Revisi</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($esport as $data)
                            <tr>
                                <td>{{ $data->nama_kontingen }}</td>
                                <td>{{ $data->fakultas }}</td>
                                <td>
                                    <span class="badge {{ $data->status == 'pending' ? 'bg-primary' : ($data->status == 'accepted' ? 'bg-success' : 'bg-danger') }}">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </td>
                                <td>{{ $data->revisi }}</td>
                                <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>





</div>
@endsection



