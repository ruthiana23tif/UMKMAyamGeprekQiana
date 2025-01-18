<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Qiana</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar')

    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-center mb-8">Ayam Geprek Qiana</h1>

        <!-- Slider Gambar Geser -->
        @if ($geser->isNotEmpty())
        <div class="relative w-full mb-10">
            <div id="slider" class="overflow-hidden w-full">
                <div class="flex transition-transform duration-500 ease-in-out" id="slider-track">
                    @foreach ($geser as $item)
                        <div class="min-w-full flex-shrink-0">
                            <img src="{{ Storage::url($item->gambar) }}" alt="Gambar {{ $item->id }}" class="w-full h-64 object-cover">
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Navigasi Slider -->
            <button id="prev" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-l">&#10094;</button>
            <button id="next" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-r">&#10095;</button>
        </div>

        @endif

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

    <script>
        const slider = document.getElementById('slider');
        const track = document.getElementById('slider-track');
        const prev = document.getElementById('prev');
        const next = document.getElementById('next');

        let index = 0;

        prev.addEventListener('click', () => {
            index = Math.max(index - 1, 0);
            track.style.transform = `translateX(-${index * 100}%)`;
        });

        next.addEventListener('click', () => {
            index = Math.min(index + 1, {{ $geser->count() }} - 1);
            track.style.transform = `translateX(-${index * 100}%)`;
        });
    </script>
</body>
</html>
