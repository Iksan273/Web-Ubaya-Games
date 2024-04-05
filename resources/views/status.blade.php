@extends('layout.user')
@section('title')
    Status Pendaftaran
@endsection
@include('layout.header')
@section('content')
@section('content')
<div class="container mt-5">
    <div class="rules-section text-white" style="background-color: rgba(245, 204, 131, 0.5); padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        <h2>Informasi Pendaftaran UBAYA GAMES 2024</h2>
        <p style="font-size: 20px;">Akan terdapat 3 status pengiriman berkas pendaftaran:</p>
        <ul style="font-size: 20px;">
            <li><span class="badge" style="background-color: blue;">Pending</span> - berkas masih dalam proses pengecekan.</li>
            <li><span class="badge" style="background-color: green;">Success</span> - berkas berhasil dan sudah diterima oleh panitia.</li>
            <li><span class="badge" style="background-color: red;">Rejected</span> - berkas ditolak, dan kontingen wajib mengirimkan ulang berkas yang benar sesuai dengan arahan revisi dari panitia.</li>
        </ul>
        <p style="font-size: 20px;" class="text-justify">Peserta yang telah menerima status <span class="badge" style="background-color: green;">Success</span> pada berkas yang dikumpulkan, akan diundang ke grup masing-masing cabang olahraga yang didaftar.</p>
    </div>


    <!-- Tabel Voli -->
    <div class="card mb-5 mt-5">
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
     <!-- Tabel Seni -->
     <div class="card mb-5">
        <div class="card-body">
            <h2 class="text-center mb-3 text-dark">Cabang Seni</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color: #2600ff; color: #FFFFFF;">
                        <tr>
                            <th>Nama Kontingen</th>
                            <th>Fakultas</th>
                            <th>Status</th>
                            <th>Revisi</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seni as $data)
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



