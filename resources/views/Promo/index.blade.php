<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 style="background-color: rgb(227, 234, 36);  padding: 20px; min-height: 70px;"
        class="text-2xl font-bold text-center text-black mb-4">Daftar Promo</h1>

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

        <a href="{{ route('promo.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4">
            Tambah Promo
        </a>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($promo as $item)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($item->gambar) }}" class="w-full h-48 object-cover" alt="{{ $item->title }}" />
                    <div class="p-4">
                        <h2 class="text-lg font-bold">{{ $item->title }}</h2>
                        <p class="text-gray-600 mt-2">{{ $item->description }}</p>
                        <p class="text-gray-500 text-sm mt-1">Diskon: {{ $item->discount }}%</p>
                        <p class="text-gray-500 text-sm">Berlaku: {{ $item->start_date }} - {{ $item->end_date }}</p>
                        <div class="mt-4 flex items-center space-x-2">
                            <a href="{{ route('promo.edit', $item->id) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-green-600">Edit</a>
                            <form action="{{ route('promo.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus promo ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-green-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
