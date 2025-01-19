<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 style="background-color: rgb(205, 35, 35); padding: 20px; min-height: 70px;" class="text-2xl font-bold text-center text-white mb-4">Edit About Us</h1>

        @if($errors->any())
            <div class="bg-red-500 text-white p-3 mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-col md:flex-row bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Image Section -->
                <div class="w-full md:w-1/2 p-4 flex flex-col justify-center">
                    @if ($about->image)
                        <img src="{{ Storage::url($about->image) }}" alt="Gambar About Us" class="w-full h-auto object-cover mb-4">
                    @endif
                    <label for="image" class="block text-sm font-medium text-gray-700">Ganti Gambar</label>
                    <input type="file" name="image" id="image" class="block w-full mt-2 border-gray-300 rounded-md" accept="image/*">
                </div>

                <!-- Content Section -->
                <div class="w-full md:w-1/2 p-4">
                    <div class="mb-3">
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="title" id="title" class="block w-full mt-2 border-gray-300 rounded-md" value="{{ old('title', $about->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" class="block w-full mt-2 border-gray-300 rounded-md" rows="5" required>{{ old('description', $about->description) }}</textarea>
                    </div>

                    <div class="flex space-x-2 mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan Perubahan</button>
                        <a href="{{ route('about.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
