<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 style="background-color: rgb(205, 35, 35);  padding: 20px; min-height: 70px;"
        class="text-2xl font-bold text-center text-white mb-4">About Us</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('about.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4">
            Tambah About
        </a>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($about as $about)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($about->image) }}" class="w-full h-48 object-cover" alt="{{ $about->title }}" />
                    <div class="p-4">
                        <h2 class="text-lg font-bold">{{ $about->title }}</h2>
                        <p class="text-gray-600 mt-2">{{ $about->description }}</p>
                        <div class="mt-4 flex items-center space-x-2">
                            <a href="{{ route('about.edit', $about->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-green-600">Edit</a>
                            <form action="{{ route('about.destroy', $about->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-green-500">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
