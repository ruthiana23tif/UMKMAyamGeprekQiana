<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if($sliders->isNotEmpty())
                @foreach($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="img-wrapper">
                        <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/1cc4789f-9086-4ec3-91c3-ee5ae906a3df_Go-Biz_20220320_091824.jpeg?auto=format"
                             class="d-block img-custom"
                             alt="{{ $slider->judul }}">
                    </div>
                    {{-- <img src="{{ asset('storage/' . $slider->gambar) }}" class="d-block img-custom" alt="{{ $slider->judul }}"> --}}
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->judul }}</h5>
                        <p>{{ $slider->deskripsi }}</p>
                    </div>
                </div>
                    {{-- iniiiii --}}
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="img-wrapper">
                            <img src="https://th.bing.com/th/id/OIP.0J-er7pZyCcRwsx4azrn1AHaHa?rs=1&pid=ImgDetMain"
                                 class="d-block img-custom"
                                 alt="{{ $slider->judul }}">
                        </div>
                        {{-- <img src="{{ asset('storage/' . $slider->gambar) }}" class="d-block w-100" alt="{{ $slider->judul }}"> --}}
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->judul }}</h5>
                            <p>{{ $slider->deskripsi }}</p>
                        </div>
                    </div>

                @endforeach
            @else
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Default Image">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>No Sliders Available</h5>
                    </div>
                </div>
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</x-app-layout>
