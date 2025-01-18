@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Slider</h1>
    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $slider->judul }}">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $slider->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            <img src="{{ asset('storage/' . $slider->gambar) }}" alt="Image" width="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
