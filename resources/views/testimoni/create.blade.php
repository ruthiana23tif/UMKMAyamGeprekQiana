<x-app-layout>
    <div class="container mx-auto">
        <h2 class="text-xl font-bold mb-4">Tambah Testimoni</h2>
        <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label for="testi" class="form-label">Testimoni</label>
                <textarea id="testi" name="testi" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" id="gambar" name="gambar" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-app-layout>
