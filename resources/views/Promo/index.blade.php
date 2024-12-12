<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Promo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/promo.css') }}">
</head>

<body>
    <div class="max-w-4xl mx-auto py-6 ">
        <h1 class="text-2xl font-bold mb-4 text-center">Daftar Promo</h1>

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif


        <a href="{{ route('promo.create') }}" class="btn btn-primary mb-2">Tambah Promo</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Diskon (%)</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promo as $promo)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $promo->title }}</td>
                        <td>
                            @if ($promo->gambar)
                                <img src="{{ Storage::url($promo->gambar) }}" width="100">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $promo->description }}</td>
                        <td>{{ $promo->discount }}</td>
                        <td>{{ $promo->start_date }}</td>
                        <td>{{ $promo->end_date }}</td>
                        <td>

                            <a href="{{ route('promo.edit', $promo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('promo.destroy', $promo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus promo ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <footer>
            <div class="social-icons">
                <img src="storage/images/LOGO UMKM.png" alt="Logo Ayam Geprek Qiana" width="200" height="200">
            </div>
            <div class="footer-left">
                <p>
                    Jl. Kartika Sari, Umban Sari, Kec. Rumbai, Kota Pekanbaru, Riau 28266
                </p>
                <div class="social-icons">
                    <a href=" " target="_blank">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png"
                            alt="Instagram">
                    </a>
                    <a href="https://wa.me/08909272987" target="_blank">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
                    </a>
                    <a href=" " target="_blank">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"
                            alt="Facebook">
                    </a>
                </div>
            </div>
            <div class="footer-center">
                <ul>
                    <h2> Ayam Geprek Qiana </h2>
                    <li><a href="#">Menu</a></li><br>
                    <li><a href="#">Promo</a></li><br>
                    <li><a href="#">contact us</a></li><br>
                    <li><a href="{{ route('dashboard') }}">Go to Dashboard</a></li>
                </ul>
            </div>

        </footer>
    </div>
</body>

</html>
