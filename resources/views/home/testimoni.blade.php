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
            <a href="{{ route('testimoni.create') }}" class="inline-block bg-red-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                Tambah Testimoni
            </a>
        </div>

        <!-- Loop Testimoni -->
        <div class="space-y-6">
            @foreach ($testimonis as $testimoni)
                <div class="bg-white shadow-md rounded-lg p-4 flex items-start">
                    <!-- Gambar -->
                    <div class="flex-shrink-0 mr-4">
                        @if ($testimoni->gambar)
                            <img src="{{ Storage::url($testimoni->gambar) }}" alt="Foto Testimoni {{ $testimoni->nama }}" class="w-20 h-20 rounded-full object-cover">
                        @else
                            <div class="w-20 h-20 rounded-full bg-gray-300 flex items-center justify-center text-gray-500">
                                Tidak Ada Gambar
                            </div>
                        @endif
                    </div>

                    <!-- Konten dan Tombol -->
                    <div class="flex-1 flex justify-between items-start">
                        <!-- Konten -->
                        <div>
                            <p class="font-bold text-lg mb-1">{{ $testimoni->nama }}</p>
                            <p class="text-gray-700">
                                {{ $testimoni->testi }}
                            </p>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="ml-4 flex flex-col space-y-2">
                            <a href="{{ route('testimoni.edit', $testimoni->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">
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
