<!-- resources/views/menu/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <style>
          .form-add-menu{
            margin-bottom: 20px;
            margin-top: 10px; /* Mengurangi margin atas */
         }
         .form-add-menu h1{
            margin-bottom: 15px; /* Mengurangi jarak antara judul dan form */
             margin-top: -15px; /* Menaikkan judul */
         }

         .back-button{
            padding: 10px 15px;
            background-color: #da7604;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            text-decoration: none;
            margin-left: 10px;
           }
        .container{
           padding-bottom: 30px;
           background: linear-gradient(to bottom, #ffffff, #f9f7f7);
          }

     </style>
</head>
<body>
    <div class="container">
       <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Tambah Menu</h1>
            <a href="{{ route('menu.index') }}" class="back-button">Kembali</a>
        </div>
        <div class="form-add-menu">
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Menu</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Menu</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <button type="submit" class="btn btn-primary">Menambahkan Menu</button>
            </form>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
