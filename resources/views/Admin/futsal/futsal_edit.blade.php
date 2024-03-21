@extends('layout.admin')


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                <h2 class="text-center">Edit Futsal</h2><br>
                <form action="{{ route('admin.updateFutsal', ['id' => $futsal->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputPosition" class="col-sm-2 col-form-label">Nama Kontingen</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPosition" name="nama_kontingen"
                                value="{{ $futsal->nama_kontingen }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputCompany" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputCompany" name="fakultas"
                                value="{{ $futsal->fakultas }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputCompany" class="col-sm-2 col-form-label">File saat ini</label>
                        <div class="col-sm-10">
                            @if ($futsal->file)
                                <p>{{ $futsal->file }}</p>

                                <a href="{{ asset('futsal/files/' . $futsal->file) }}" target="_blank">Download/View current
                                    file</a>
                            @else
                                <p>No file uploaded.</p>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="file" class="col-sm-2 col-form-label">Upload File Baru</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="file" name="file">
                            <small>Jika ingin mengganti file, silahkan upload file baru.</small>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>

        </div>
    </div>
@endsection
