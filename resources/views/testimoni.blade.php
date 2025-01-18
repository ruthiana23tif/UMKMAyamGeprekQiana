<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni - Ayam Geprek Qiana</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar')

    <div class="container mx-auto mt-10">
        <section class="py-10 bg-gray-100">
            <h2 class="text-2xl font-bold text-center mb-6">Apa Kata Pelanggan Kami?</h2>

            @if ($testimonis->isEmpty())
                <p class="text-gray-500 text-center">Belum ada testimoni.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($testimonis as $testimoni)
                        <div class="bg-white shadow-lg rounded-lg p-5">
                            <!-- Gambar -->
                            <div class="flex justify-center mb-4">
                                @if ($testimoni->gambar)
                                    <img src="{{ Storage::url($testimoni->gambar) }}" alt="Testimoni {{ $testimoni->nama }}" class="w-24 h-24 rounded-full object-cover">
                                @else
                                    <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center text-gray-500">
                                        Tidak Ada Gambar
                                    </div>
                                @endif
                            </div>

                            <!-- Konten Testimoni -->
                            <div class="text-center">
                                <p class="font-bold text-lg">{{ $testimoni->nama }}</p>
                                <p class="text-gray-600 mt-2 italic">"{{ $testimoni->testi }}"</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
</body>
</html>
