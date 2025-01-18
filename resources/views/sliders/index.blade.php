@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Slider</h1>
    <a href="{{ route('sliders.create') }}" class="btn btn-primary mb-3">Tambah Slider</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
            <tr>
                <td><img src="{{ Storage::url($slider->gambar) }}" alt="Foto slider {{ $slider->judul }}" class="w-20 h-20 rounded-full object-cover"></td>

                <td>{{ $slider->judul }}</td>
                <td>{{ $slider->deskripsi }}</td>
                <td>
                    <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
