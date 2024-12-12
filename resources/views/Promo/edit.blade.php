<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Promo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Promo</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Tambahkan enctype untuk mendukung pengunggahan file -->
        <form action="{{ route('promo.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul Promo</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $promo->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $promo->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="discount" class="form-label">Diskon (%)</label>
                <input type="number" name="discount" id="discount" class="form-control" value="{{ old('discount', $promo->discount) }}" required>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $promo->start_date) }}" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Tanggal Berakhir</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $promo->end_date) }}" required>
            </div>

            <div class="mb-4">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                @if ($promo->gambar)
                    <div class="mt-2">
                        <p>Gambar Saat Ini:</p>
                        <img src="{{ Storage::url($promo->gambar) }}" alt="Gambar promo" class="img-fluid" style="max-height: 200px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('promo.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
