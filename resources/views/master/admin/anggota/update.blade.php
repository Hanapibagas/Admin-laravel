@extends('master.index')

@section('content')

<form action="{{ route('update-member', $member->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="floatingInput">Kode Member</label>
        <input type="text" class="form-control @error('member_code') is-invalid @enderror" id="floatingInput"
            placeholder="Member_Code" name="member_code" value="{{ $member->member_code }}">
            @error('member_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput"
            placeholder="Name" name="name" value="{{ $member->name }}">
            @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Alamat</label>
        <input type="text" class="form-control  @error('address') is-invalid @enderror" id="floatingInput"
            placeholder="Alamat" name="address" value="{{ $member->address }}">
            @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Jenis Kelamin</label>
        <select class="custom-select @error('gender') is-invalid @enderror" id="inputGroupSelect01" name="gender">
            <option @if ($member->gender == "Laki-Laki") selected @endif value="Laki-Laki">Laki-Laki</option>
            <option @if ($member->gender == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
        </select>
        @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="floatingInput">Foto</label>
        <small>Pilih gambar jika ingin mengubah</small>
        <input type="file" class="form-control" id="floatingInput"
            placeholder="Foto" name="image" value="{{ $member->image }}">
        @if ($member->image)
            <img class="mt-3" width="100px" height="100px" src="{{ asset('storage/' .$member->image) }}" alt="scascs">
        @else
        <p>Gmabr Tidak Tersedia</p>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">
        Perbarui
    </button>
</form>
@endsection
