@extends('layout.admin')


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
                <h2 class="text-center">Data Cabang Basket</h2><br>
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
                            @foreach ($basket as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->nama_kontingen }}</td>
                                    <td>{{ $data->fakultas }}</td>
                                    <td>
                                       <button type="button" class="btn btn-success text-white"> <a href="{{ asset('basket/files/' . $data->file) }}">View</a></button>


                                        &nbsp; <!-- Menambahkan spasi antara tombol -->
                                        <a href="{{ asset('basket/files/' . $data->file) }}" download="{{ $data->file }}">
                                            <button type="button" class="btn btn-primary">
                                                Download File
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.editBasket', ['id' => $data->id]) }}"><button
                                                class="btn btn-primary btn-sm" data-bs-toggle="modal">Update</button></a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $data->id }}">Delete</button>
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $data->status == 'pending' ? 'bg-primary' : ($data->status == 'accepted' ? 'bg-success' : 'bg-danger') }}">
                                            {{ ucfirst($data->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $data->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $data->updated_at->format('Y-m-d') }}</td>
                                </tr>
                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="deleteForm"
                                                action="{{ route('admin.deleteBasket', ['id' => $data->id]) }}"
                                                method="POST">
                                                @csrf <!-- CSRF Token untuk Laravel -->
                                                @method('DELETE') <!-- Method Spoofing untuk Laravel -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus data
                                                        dengan ID {{ $data->id }}</h5>
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
    <script>
        function showPDF() {
            var pdfViewer = document.getElementById('pdfViewer');
            if (pdfViewer.style.display === "none") {
                pdfViewer.style.display = "block";
            } else {
                pdfViewer.style.display = "none"; // Opsional: Tambahkan ini jika Anda ingin tombol juga menyembunyikan <iframe> saat ditekan lagi
            }
        }
        </script>

@endsection
