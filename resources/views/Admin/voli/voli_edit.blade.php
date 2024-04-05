@extends('Layout.admin')


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
<style>
    .status-pending { background-color: blue; color: white; }
    .status-accepted { background-color: green; color: white; }
    .status-rejected { background-color: red; color: white; }
</style>

<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <h2 class="text-center">Edit Voli</h2><br>
            <form action="{{ route('admin.updateVoli', ['id' => $voli->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="inputPosition" class="col-sm-2 col-form-label">Nama Kontingen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPosition" name="nama_kontingen" value="{{ $voli->nama_kontingen }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputCompany" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputCompany" name="fakultas" value="{{ $voli->fakultas }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="status" name="status" >
                            <option value="pending" style="background-color: blue;">Pending</option>
                            <option value="accepted" style="background-color: green;">Accepted</option>
                            <option value="rejected" style="background-color: red;">Rejected</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="revisi" class="col-sm-2 col-form-label">Revisi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="revisi" name="revisi" rows="3">{{ $voli->revisi }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var statusSelect = document.getElementById('status');
        var initialClass = 'form-control ';

        function updateStatusColor() {
            statusSelect.className = initialClass; // Reset to default
            if(statusSelect.value === 'pending') {
                statusSelect.classList.add('status-pending');
            } else if(statusSelect.value === 'accepted') {
                statusSelect.classList.add('status-accepted');
            } else if(statusSelect.value === 'rejected') {
                statusSelect.classList.add('status-rejected');
            }
        }

        statusSelect.addEventListener('change', updateStatusColor);

        updateStatusColor();
    });
</script>


@endsection
