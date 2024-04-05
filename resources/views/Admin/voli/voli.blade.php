@extends('Layout.admin')


@section('content')
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
                <h2 class="text-center">Data Cabang Voli</h2><br>
                <!-- Menambahkan div dengan kelas .table-responsive di sekitar tabel -->
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-white">ID</th>
                                <th class="text-white">Nama Kontingen</th>
                                <th class="text-white">Fakultas</th>
                                <th class="text-white">File Pendaftaran</th>
                                <th class="text-white">Actions</th>
                                <th class="text-white">Status</th>
                                <th class="text-white">Tanggal Daftar</th>
                                <th class="text-white">Tanggal Update</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($volis as $voli)
                                <tr>
                                    <td>{{ $voli->id }}</td>
                                    <td>{{ $voli->nama_kontingen }}</td>
                                    <td>{{ $voli->fakultas }}</td>
                                    <td>
                                         <a href="{{ asset('voli/files/' . $voli->file) }}" style="color: white; text-decoration: none;">
                                                <button type="button" class="btn btn-success text-white"> View </button>
                                            </a>
                                        &nbsp; <!-- Menambahkan spasi antara tombol -->
                                        <a href="{{ asset('voli/files/' . $voli->file) }}" download="{{ $voli->file }}"
                                            rel="noopener noreferrer">
                                            <button type="button" class="btn btn-primary">
                                                Download File
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.editVoli',['id'=>$voli->id]) }}"><button class="btn btn-primary btn-sm"
                                                data-bs-toggle="modal">Update</button></a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $voli->id }}">Delete</button>
                                    </td>
                                    <td>
                                        <span class="badge {{ $voli->status == 'pending' ? 'bg-primary' : ($voli->status == 'accepted' ? 'bg-success' : 'bg-danger') }}">
                                            {{ ucfirst($voli->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $voli->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $voli->updated_at->format('Y-m-d') }}</td>
                                </tr>
                                 <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal{{ $voli->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="deleteForm" action="{{ route('admin.deleteVoli',['id' => $voli->id]) }}" method="POST">
                                            @csrf <!-- CSRF Token untuk Laravel -->
                                            @method('DELETE') <!-- Method Spoofing untuk Laravel -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus data dengan ID {{ $voli->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
