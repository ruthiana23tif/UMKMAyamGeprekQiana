<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h2 class="text-2xl font-bold mb-6 text-center">Daftar Gambar</h2>

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

        <!-- Tombol Tambah Gambar -->
        <div class="mb-6 text-center">
            <a href="{{ route('geser.create') }}" class="inline-block bg-red-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                Tambah Gambar
            </a>
        </div>

        <!-- Loop Gambar -->
        <div class="space-y-6">
            @foreach ($geser as $item)
                <div class="bg-white shadow-md rounded-lg p-4 flex items-start">
                    <!-- Gambar -->
                    <div class="flex-shrink-0 mr-4">
                        @if ($item->gambar)
                            <img src="{{ Storage::url($item->gambar) }}" alt="Gambar {{ $item->id }}" class="w-20 h-20 rounded-full object-cover">
                        @else
                            <div class="w-20 h-20 rounded-full bg-gray-300 flex items-center justify-center text-gray-500">
                                Tidak Ada Gambar
                            </div>
                        @endif
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex-1 flex justify-end items-start">
                        <div class="ml-4 flex flex-col space-y-2">
                            <a href="{{ route('geser.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">
                                Edit
                            </a>
                            <form action="{{ route('geser.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gambar ini?');">
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
