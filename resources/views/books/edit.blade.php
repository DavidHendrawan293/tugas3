@extends('layouts.master')

@section('title', 'Edit Movie')

@section('content')
    <h2>Update New Movie</h2>
    <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="judul">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul"
                    value="{{ old('judul') ?? $book->judul }}">
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <textarea class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" rows="3">{{ old('kategori') ?? $book->kategori }}
 </textarea>
            @error('kategori')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title">Halaman</label>
                <input type="number" class="form-control @error('halaman') is-invalid @enderror" name="halaman"
                    id="halaman" min="1900" max="2099" value="{{ old('halaman') ?? $book->halaman }}">
                @error('halaman')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="genre">Penerbit</label>
                <input type="number" step="0.1" class="form-control @error('penerbit') is-invalid @enderror"
                    name="penerbit" id="penerbit" min="1" max="10"
                    value="{{ old('penerbit') ?? $book->penerbit }}">
                @error('penerbit')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
    </form>
@endsection
