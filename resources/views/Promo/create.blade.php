<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h1 style="background-color: rgb(227, 234, 36); padding: 20px; min-height: 70px;"
            class="text-2xl font-bold text-center text-black mb-4">
            Tambah Promo
        </h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Tambah Promo -->
        <form action="{{ route('promo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="mb-3">
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Promo</label>
                    <input type="text" name="title" id="title"
                        class="block w-full mt-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description"
                        class="block w-full mt-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        rows="4" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="discount" class="block text-sm font-medium text-gray-700">Diskon (%)</label>
                    <input type="number" name="discount" id="discount"
                        class="block w-full mt-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('discount') }}" required>
                </div>

                <div class="mb-3">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date"
                        class="block w-full mt-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('start_date') }}" required>
                </div>

                <div class="mb-3">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Berakhir</label>
                    <input type="date" name="end_date" id="end_date"
                        class="block w-full mt-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('end_date') }}" required>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" name="gambar" id="gambar"
                        class="block w-full mt-2 border-gray-300 rounded-md focus:ring-blue-100 focus:border-blue-100"
                        accept="image/*">
                </div>

                <div class="flex space-x-4 mt-4">
                    <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                        Tambah Promo
                    </button>
                    <a href="{{ route('promo.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                        Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
