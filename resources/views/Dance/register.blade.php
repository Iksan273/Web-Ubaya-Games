<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register Dance</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <h2>Form Daftar Dance</h2>
        <form action="{{ route('register.dance') }}" method="post" enctype="multipart/form-data">
            @csrf <!-- CSRF token is required for security -->
            <div class="form-group">
                <label for="nama_kontingen">Nama Kontingen</label>
                <input type="text" class="form-control" id="nama_kontingen" name="nama_kontingen" required>
            </div>
            <div class="form-group">
                <label for="fakultas">Fakultas</label>
                <input type="text" class="form-control" id="fakultas" name="fakultas" required>
            </div>
            <div class="form-group">
                <label for="file">File (PDF/Word)</label>
                <input type="file" class="form-control-file" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>
