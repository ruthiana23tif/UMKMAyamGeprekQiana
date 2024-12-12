<x-app-layout>
    <div class="container mx-auto">
        <h2 class="text-xl font-bold mb-4 text-center">Edit Testimoni</h2>
        <form action="{{ route('testimoni.update', $testimoni->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ $testimoni->nama }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Masukkan nama Anda">
            </div>
            <div class="mb-4">
                <label for="testi" class="block text-sm font-medium text-gray-700">Testimoni</label>
                <textarea
                    id="testi"
                    name="testi"
                    rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Tuliskan testimoni Anda">{{ $testimoni->testi }}</textarea>
            </div>
            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border file:border-gray-300 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
                <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
            </div>
            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Perbarui
            </button>
        </form>
    </div>
</x-app-layout>
