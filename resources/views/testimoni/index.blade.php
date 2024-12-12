<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h2 class="text-2xl font-bold mb-6 text-center">Daftar Testimoni</h2>

        @if (session('success'))
            <div class="bg-green-500 text-white p-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-3 mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tombol Tambah Testimoni -->
        <div class="mb-6 text-center">
            <a href="{{ route('testimoni.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                Tambah Testimoni
            </a>
        </div>

        <!-- Loop Testimoni -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($testimonis as $testimoni)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="flex-shrink-0 p-4">
                        @if ($testimoni->gambar)
                            <img src="{{ Storage::url('testimoni/' . $testimoni->gambar) }}" alt="Foto Testimoni {{ $testimoni->nama }}" class="w-20 h-20 rounded-full object-cover">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </div>

                    <!-- Bagian Konten Testimoni -->
                    <div class="p-4">
                        <p class="font-bold text-lg mb-1">{{ $testimoni->nama }}</p>
                        <p class="mt-3 text-gray-700">
                            {{ $testimoni->testi }}
                        </p>

                        <!-- Tombol Aksi -->
                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('testimoni.edit', $testimoni->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded">
                                Edit
                            </a>
                            <form action="{{ route('testimoni.destroy', $testimoni->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
