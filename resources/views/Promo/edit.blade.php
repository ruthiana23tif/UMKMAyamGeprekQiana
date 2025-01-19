<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 style="background-color: rgb(227, 234, 36); padding: 20px; min-height: 70px;" class="text-2xl font-bold text-center text-black mb-4">
            Edit Promo
        </h1>

        @if($errors->any())
            <div class="bg-red-500 text-white p-3 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('promo.update', $promo->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Promo</label>
                <input type="text" name="title" id="title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('title', $promo->title) }}" required>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ old('description', $promo->description) }}</textarea>
            </div>

            <div>
                <label for="discount" class="block text-sm font-medium text-gray-700">Diskon (%)</label>
                <input type="number" name="discount" id="discount" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('discount', $promo->discount) }}" required>
            </div>

            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('start_date', $promo->start_date) }}" required>
            </div>

            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Berakhir</label>
                <input type="date" name="end_date" id="end_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('end_date', $promo->end_date) }}" required>
            </div>

            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" accept="image/*">
                @if ($promo->gambar)
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Gambar Saat Ini:</p>
                        <img src="{{ Storage::url($promo->gambar) }}" alt="Gambar promo" class="img-fluid" style="max-height: 200px;">
                    </div>
                @endif
            </div>

            <div class="flex space-x-4 mt-4">
                <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                    Simpan Perubahan
                </button>
                <a href="{{ route('promo.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                    Kembali
                </a>
        </form>
    </div>
</x-app-layout>
