<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
         .card{
             border-radius: 10px;
         }
        .navbar {
          background-color: #af1515;
          color: #ffffff;
        }
        .navbar-brand{
          color:#ffffff;
        }
        .nav-link{
            color:#ffffff;
            cursor: pointer;
        }
        .navbar-toggler{
            background-color: #ffffff;
        }
        .btn-mobile{
            background-color: #14ce07;
            color: #ffffff;
        }
        .menu-card-container{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around; /* Untuk menyebarkan card */
            gap: 20px; /* Untuk memberikan jarak antar card */
        }
        .menu-card{
             width: 220px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .card-body{
            padding: 15px;
            display: flex; /* Add flexbox */
            flex-direction: column; /* Make it a column */
            justify-content: space-between; /* Space between content and buttons */
         }
        .form-add-menu{
            margin-bottom: 20px;
             margin-top: 20px;
        }
        .menu-container {
            background: linear-gradient(to bottom, #f0f0f0, #ffffff);
             padding-bottom: 30px;
         }
         .menu-card-action{
            margin-top: 10px; /* Tambahkan margin di atas button */
             display: flex;
             justify-content: space-between;
         }
          .footer {
            background-color: #af1515;
            color: #f7f7f7;
            padding: 30px 0;
             font-size: 14px;
        }
         .footer-container{
             display: flex;
             align-items: center;
            justify-content: space-between;
            padding: 0 15px;
         }
       .footer h5{
            font-weight: bold;
       }
         .footer-link {
           margin-left: 20px;
             display: block;
        }
        .footer-link a {
           color: #f8f8f8;
            text-decoration: none;
        }
        .footer-link a:hover{
           color: #3043f0;
        }
       .footer-social a {
            color: #f9f9f9;
             font-size: 20px;
            margin-right: 15px;
            text-decoration: none;
        }
        .footer-social a:hover{
           color: #a8b4ad;
        }
         .footer-copyright{
            text-align: left;
             margin-bottom: 15px;
         }
        .footer-about-link{
           font-size: 1.2em;
         }
        .footer-about-link a{
            margin-right: 10px;
        }
        .footer-items{
            margin-bottom: 10px;
        }
        .footer-about-section{
           display: flex;
           flex-direction: column;
            justify-content: space-between;
           height: 100%;
            text-align: left;

        }
        .footer-customer-section{
           display: flex;
           flex-direction: column;
           height: 100%;
            justify-content: space-evenly;
        }
        .footer-social-section{
           display: flex;
           flex-direction: column;
            justify-content: center;
           align-items: center;
          height: 100%;
           margin-left: auto;
        }
         .footer-content{
             display: flex;
           gap: 50px;
          align-items: center;
        }
         .search-bar-container {
          margin: 10px 0;
          padding: 5px 0;
           display: flex;
           justify-content: end;
           align-items: center;
         }
          .search-bar-container input{
              border: 1px solid #ddd;
             border-radius: 4px;
             padding: 10px;
             width: 300px;
             background: white;
         }
         .search-bar-container button{
             padding: 10px 15px;
             background-color: #af1515;
             border: none;
             border-radius: 5px;
             color: #ffffff;
             cursor: pointer;
             margin-left: 10px;
         }
    </style>
</head>

     <div class="container">
         <div class="search-bar-container">
            <form action="{{ route('menu.index') }}" method="GET">
               <input type="text" placeholder="Cari menu..." name="search">
               <button type="submit" class="btn btn-primary">Cari</button>
           </form>
        </div>
        <div class="container mt-4">
         @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
             </div>
         @endif
        <div class="form-add-menu">
             <h1>Tambah Menu</h1>
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
                <button type="submit" class="btn btn-primary">Tambah Menu</button>
            </form>
       </div>
        <div class="menu-container">
           <h1 class="mt-4">Menu Makanan</h1>
            <div class="menu-card-container">
                @foreach($menus as $menu)
                    <div class="menu-card">
                         @if($menu->gambar)
                            <img src="{{ asset('image/' . $menu->gambar) }}" class="card-img-top" alt="{{ $menu->nama }}">
                         @else
                           <img src="https://placehold.co/600x400/ededed/4b4b4b?text=No+Image" class="card-img-top" alt="No Image">
                         @endif
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">{{ $menu->nama }}</h5>
                                <p class="card-text">{{ $menu->deskripsi }}</p>
                                <p class="card-text">Harga: Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            </div>
                            <div class="menu-card-action">
                                 <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">Delete</button>
                                </form>
                           </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
