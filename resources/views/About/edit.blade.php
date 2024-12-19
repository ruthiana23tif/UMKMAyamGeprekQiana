<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit About Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit About Us</h1>

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
        <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $about->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $about->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                @if ($about->image)
                    <div class="mt-2">
                        <p>Gambar Saat Ini:</p>
                        <img src="{{ Storage::url($about->image) }}" alt="Gambar About Us" class="img-fluid" style="max-height: 200px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('about.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
