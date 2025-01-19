<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 style="background-color: rgb(34, 150, 243); padding: 20px; min-height: 70px;"
            class="text-2xl font-bold text-center text-white mb-4">Tambah Menu</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-xl font-bold text-gray-700">Tambah Menu</h1>

            </div>

            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Menu</label>
                    <input type="text" id="nama" name="nama"
                        class="block w-full mt-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Menu</label>
                    <textarea id="deskripsi" name="deskripsi"
                        class="block w-full mt-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <div class="mb-4">
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" id="harga" name="harga"
                        class="block w-full mt-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Menu</label>
                    <input type="file" id="gambar" name="gambar"
                        class="block w-full mt-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" accept="image/*">
                </div>

                <div class="flex space-x-4">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan Menu</button>
                        <a href="{{ route('menu.index') }}"
                   class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
