<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 style="background-color: rgb(205, 35, 35); padding: 20px; min-height: 70px;" class="text-2xl font-bold text-center text-white mb-4">Edit Menu</h1>

        @if($errors->any())
            <div class="bg-red-500 text-white p-3 mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-col items-center justify-center bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Content Section -->
                <div class="w-full max-w-lg p-4">
                    <div class="mb-3">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Menu</label>
                        <input type="text" name="nama" id="nama" class="block w-full mt-2 border-gray-300 rounded-md" value="{{ old('nama', $menu->nama) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Menu</label>
                        <textarea name="deskripsi" id="deskripsi" class="block w-full mt-2 border-gray-300 rounded-md" rows="5">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="number" name="harga" id="harga" class="block w-full mt-2 border-gray-300 rounded-md" value="{{ old('harga', $menu->harga) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="block text-sm font-medium text-gray-700">Ganti Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="block w-full mt-2 border-gray-300 rounded-md" accept="image/*">
                    </div>

                    <div class="flex space-x-2 mt-4 justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Menu</button>
                        <a href="{{ route('menu.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
