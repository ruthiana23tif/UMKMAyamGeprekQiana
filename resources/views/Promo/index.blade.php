<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Promo</h1>

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
                        <div class="mt-4">
                            <a href="{{ route('promo.edit', $item->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('promo.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus promo ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline ml-2">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <footer>
            <div class="social-icons">
                <img src="storage/images/LOGO UMKM.png" alt="Logo Ayam Geprek Qiana" width="200" height="200">
            </div>
            <div class="footer-left">
                <p>
                    Jl. Kartika Sari, Umban Sari, Kec. Rumbai, Kota Pekanbaru, Riau 28266
                </p>
                <div class="social-icons">
                    <a href=" " target="_blank">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
                    </a>
                    <a href="https://wa.me/08909272987" target="_blank">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
                    </a>
                    <a href=" " target="_blank">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"
                            alt="Facebook">
                    </a>
                </div>
            </div>
            <div class="footer-center">
                <ul>
                    <h2> Ayam Geprek Qiana </h2>
                    <li><a href="#">Menu</a></li><br>
                    <li><a href="{{ route('promo.index') }}">Promo</a></li><br>
                    <li><a href="#">contact us</a></li><br>
                    <li><a href="{{ route('dashboard') }}">Go to Dashboard</a></li>
                </ul>
            </div>

        </footer> --}}
    </div>
</x-app-layout>
