<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .about-item {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .about-item:nth-child(odd) {
            flex-direction: row;
        }

        .about-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .about-image {
            flex: 1;
            max-width: 45%;
            margin-right: 20px;
        }

        .about-content {
            flex: 1;
            max-width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .about-content h2 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .about-content p {
            color: #555;
            margin-top: 10px;
        }

        .about-content .actions {
            margin-top: 15px;
        }

        .actions button, .actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 style="background-color: rgb(205, 35, 35); padding: 20px; min-height: 70px;" class="text-2xl font-bold text-center text-white mb-4">About Us</h1>

        <!-- Success Message -->
        <div class="alert alert-success" style="display: none;">About berhasil ditambahkan!</div>

        <!-- Tambah About Button -->
        <a href="{{ route('about.create') }}" class="btn btn-primary mb-4">Tambah About</a>

        <!-- About List -->
        <div class="about-list">
            @foreach ($about as $about)
                <div class="about-item">
                    <!-- Image Section -->
                    <div class="about-image">
                        <img src="{{ Storage::url($about->image) }}" alt="{{ $about->title }}" class="img-fluid rounded shadow">
                    </div>

                    <!-- Content Section -->
                    <div class="about-content">
                        <h2>{{ $about->title }}</h2>
                        <p>{{ $about->description }}</p>

                        <!-- Action Buttons -->
                        <div class="actions">
                            <a href="{{ route('about.edit', $about->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('about.destroy', $about->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
