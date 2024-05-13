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
                <h2 class="text-center">Data Cabang Seni (Fotografi)</h2><br>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-white">ID</th>
                                <th class="text-white">Nama </th>
                                <th class="text-white">Nrp</th>
                                <th class="text-white">Kontingen</th>
                                <th class="text-white">Jurnalistik - 1 </th>
                                <th class="text-white">Jurnalistik - 2</th>
                                <th class="text-white">Jurnalistik - 3 </th>
                                <th class="text-white">Jurnalistik - 4 </th>
                                <th class="text-white">Jurnalistik - 5 </th>
                                <th class="text-white">Seni Murni - 1 </th>
                                <th class="text-white">Seni Murni - 2</th>
                                <th class="text-white">Seni Murni - 3 </th>
                                <th class="text-white">Seni Murni - 4 </th>
                                <th class="text-white">Seni Murni - 5 </th>

                                <th class="text-white">Actions</th>
                                <th class="text-white">Tanggal Daftar</th>
                                <th class="text-white">Tanggal Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foto as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->nrp }}</td>
                                    <td>{{ $data->kontingen }}</td>
                                    <!-- Loop untuk kategori 1 -->
                                    @for ($i = 1; $i <= 5; $i++)
                                        <td>
                                            @if (!is_null($data->{'foto' . $i . '_kategori1'}))
                                                <a href="#" style="color: white; text-decoration: none;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewModal1_{{ $data->id }}_{{ $i }}">
                                                    <button type="button" class="btn btn-success text-white"> View
                                                    </button>
                                                </a>
                                                <a href="{{ asset('foto/files/' . $data->{'foto' . $i . '_kategori1'}) }}"
                                                    download="{{ $data->{'foto' . $i . '_kategori1'} }}">
                                                    <button type="button" class="btn btn-primary">
                                                        Download File
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    @endfor
                                    <!-- Loop untuk kategori 2 -->
                                    @for ($i = 1; $i <= 5; $i++)
                                        <td>
                                            @if (!is_null($data->{'foto' . $i . '_kategori2'}))
                                                <a href="#" style="color: white; text-decoration: none;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewModal2_{{ $data->id }}_{{ $i }}">
                                                    <button type="button" class="btn btn-success text-white"> View
                                                    </button>
                                                </a>
                                                <a href="{{ asset('foto/files/' . $data->{'foto' . $i . '_kategori2'}) }}"
                                                    download="{{ $data->{'foto' . $i . '_kategori2'} }}">
                                                    <button type="button" class="btn btn-primary">
                                                        Download File
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    @endfor
                                    <!-- Kolom Actions -->
                                    <td>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $data->id }}">Delete</button>
                                    </td>
                                    <!-- Kolom Tanggal Daftar -->
                                    <td>{{ $data->created_at->format('Y-m-d') }}</td>
                                    <!-- Kolom Tanggal Update -->
                                    <td>{{ $data->updated_at->format('Y-m-d') }}</td>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form id="deleteForm"
                                                    action="{{ route('admin.deleteFoto', ['id' => $data->id]) }}"
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal untuk menampilkan gambar kategori 1 -->
    @foreach ($foto as $data)
        @for ($i = 1; $i <= 5; $i++)
            @if (!is_null($data->{'foto' . $i . '_kategori1'}))
                <div class="modal fade" id="viewModal1_{{ $data->id }}_{{ $i }}" tabindex="-1"
                    aria-labelledby="viewModalLabel1_{{ $data->id }}_{{ $i }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel1_{{ $data->id }}_{{ $i }}">
                                    Gambar Jurnalistik - {{ $i }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('foto/files/' . $data->{'foto' . $i . '_kategori1'}) }}" class="img-fluid"
                                    alt="Gambar Kategori 1">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endfor
    @endforeach

    <!-- Modal untuk menampilkan gambar kategori 2 -->
    @foreach ($foto as $data)
        @for ($i = 1; $i <= 5; $i++)
            @if (!is_null($data->{'foto' . $i . '_kategori2'}))
                <div class="modal fade" id="viewModal2_{{ $data->id }}_{{ $i }}" tabindex="-1"
                    aria-labelledby="viewModalLabel2_{{ $data->id }}_{{ $i }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel2_{{ $data->id }}_{{ $i }}">
                                    Gambar Seni Murni - {{ $i }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('foto/files/' . $data->{'foto' . $i . '_kategori2'}) }}" class="img-fluid"
                                    alt="Gambar Kategori 2">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endfor
    @endforeach
@endsection
