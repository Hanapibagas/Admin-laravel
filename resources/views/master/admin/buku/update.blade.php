@extends('master.index')

@section('content')
<form action="{{ route('update-book', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="floatingInput">Kode Buku</label>
        <input value="{{ $book->book_code }}" type="text" class="form-control @error('book_code') is-invalid @enderror" id="floatingInput" placeholder="Book_Code" name="book_code">
        @error('book_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Judul</label>
        <input value="{{ $book->tittle }}" type="text" class="form-control @error('tittle') is-invalid @enderror" id="floatingInput" placeholder="Tittle" name="tittle">
        @error('tittle')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Penerbit</label>
        <input value="{{ $book->publisher }}"  type="text" class="form-control @error('publisher') is-invalid @enderror" id="floatingInput" placeholder="Publisher" name="publisher">
        @error('publisher')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Tahun Penerbit</label>
        <input value="{{ $book->publisher_year	 }}" type="date" class="form-control @error('publisher_year') is-invalid @enderror" id="floatingInput" placeholder="Publication Year" name="publisher_year">
        @error('publisher_year')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Sampul</label><br>
        <small>Pilih gambar jika ingin ingin di mengubah</small>
        <input value="{{ $book->cover }}" type="file" class="form-control" id="floatingInput" placeholder="Cover" name="cover">
        @if ($book->cover)
        <img class="mt-3" width="100px" height="100px" src="{{ asset('storage/'.$book->cover) }}" alt="hello">
        @else
        <p>Gambar tidak tersedia</p>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">
        Pebarui
    </button>
</form>
@endsection

