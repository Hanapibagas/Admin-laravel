@extends('master.index')

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="floatingInput">Kode Member</label>
        <input type="text" class="form-control @error('member_code') is-invalid @enderror" id="floatingInput"
            placeholder="Member Code" name="member_code">
        @error('member_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput"
            placeholder="Name" name="name">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Alamat</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="floatingInput"
            placeholder="Addres" name="address">
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Jenis Kelamin</label>
        <select class="custom-select @error('gender') is-invalid @enderror" id="inputGroupSelect01" name="gender">
            <option label="Silhakan isi..."></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Foto</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="floatingInput"
            placeholder="Foto" name="image">
        @error('image')
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
