<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <!-- Navbar -->
        <nav class="bg-blue-500 text-white p-4 rounded mb-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Menu Makanan</h1>
            <div>
                <a href="{{ route('menu.create') }}" class="bg-green-500 px-4 py-2 rounded text-white hover:bg-green-600">
                    Tambah Menu
                </a>
            </div>
        </nav>

        <!-- Search Bar -->
        <div class="mb-4">
            <form action="{{ route('menu.index') }}" method="GET" class="flex">
                <input type="text" name="search" placeholder="Cari menu..." class="flex-1 p-2 border border-gray-300 rounded-l">
                <button type="submit" class="bg-blue-500 px-4 py-2 text-white rounded-r hover:bg-blue-600">Cari</button>
            </form>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Menu List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @if($menus->count() > 0)
                @foreach($menus as $menu)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        @if($menu->gambar)
                            <img src="{{ asset('image/' . $menu->gambar) }}" class="w-full h-48 object-cover" alt="{{ $menu->nama }}">
                        @else
                            <img src="https://placehold.co/600x400/ededed/4b4b4b?text=No+Image" class="w-full h-48 object-cover" alt="No Image">
                        @endif
                        <div class="p-4">
                            <h2 class="text-lg font-bold">{{ $menu->nama }}</h2>
                            <p class="text-gray-600 mt-2">{{ $menu->deskripsi }}</p>
                            <p class="text-gray-500 text-sm mt-1">Harga: Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            <div class="mt-4 flex justify-between">
                                <a href="{{ route('menu.edit', $menu->id) }}" class="bg-yellow-500 px-4 py-2 rounded text-white hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-600">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-gray-500 text-center">Menu Tidak Ada</p>
            @endif
        </div>
    </div>
</x-app-layout>
