<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 style="background-color: rgb(205, 35, 35); padding: 20px; min-height: 70px;" class="text-2xl font-bold text-center text-white mb-4">About Us</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('about.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4">
            Tambah About
        </a>

        <div class="about-list grid gap-4">
            @foreach ($about as $key => $about)
                <div class="flex {{ $key % 2 == 0 ? 'flex-row' : 'flex-row-reverse' }} bg-white shadow-md rounded-lg overflow-hidden">
                    <!-- Image Section -->
                    <div class="w-1/2">
                        <img src="{{ Storage::url($about->image) }}" alt="{{ $about->title }}" class="w-full h-auto object-cover">
                    </div>

                    <!-- Content Section -->
                    <div class="w-1/2 p-4 flex flex-col justify-center">
                        <h2 class="text-3xl font-bold text-center">{{ $about->title }}</h2>
                        <p style="font-size: 18px;" class="text-gray-600 mt-2 text-justify">{{ $about->description }}</p>

                        <!-- Action Buttons -->
                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('about.edit', $about->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('about.destroy', $about->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-10">
            <div class="grid grid-cols-1 gap-4">
                <div class="flex overflow-hidden">
                    <img src="storage/images/1.jpeg" alt="Image 1" class="w-1/5 object-cover">
                    <img src="storage/images/2.jpeg" alt="Image 2" class="w-1/5 object-cover">
                    <img src="storage/images/3.jpeg" alt="Image 3" class="w-1/5 object-cover">
                    <img src="storage/images/4.jpeg" alt="Image 4" class="w-1/5 object-cover">
                    <img src="storage/images/5.jpeg" alt="Image 5" class="w-1/5 object-cover">
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

c:\laragon\www\Sistem-Ayam-Geprek-Qiana\image\2.2.jpg
