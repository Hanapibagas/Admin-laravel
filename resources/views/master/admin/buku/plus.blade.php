@extends('master.index')

@section('content')
    <form action="{{ route('store-book') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="floatingInput">Kode Buku</label>
            <input type="text" class="form-control @error('book_code') is-invalid @enderror" id="floatingInput" placeholder="Book_Code" name="book_code">
            @error('book_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        <div class="form-group">
            <label for="floatingInput">Judul</label>
            <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="floatingInput" placeholder="Tittle" name="tittle">
            @error('tittle')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        <div class="form-group">
            <label for="floatingInput">Penerbit</label>
            <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="floatingInput" placeholder="Publisher" name="publisher">
            @error('publisher')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        <div class="form-group">
            <label for="floatingInput">Tahun Penerbit</label>
            <input type="date" class="form-control @error('publisher_year') is-invalid @enderror" id="floatingInput" placeholder="Publication Year" name="publisher_year">
            @error('publisher_year')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        <div class="form-group">
            <label for="floatingInput">Sampul</label>
            <input type="file" class="form-control @error('cover') is-invalid @enderror" id="floatingInput" placeholder="Cover" name="cover">
            @error('cover')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Kirim
        </button>
    </form>
@endsection
