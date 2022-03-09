@extends('master.index')

@section('content')
<div class="row">
    <a href="{{ route('create-book') }}" class="btn btn-primary">Tambah</a>
</div>
<table class="table mt-3">
    <thead class="table table-dark table-striped">
        <tr>
            <th scope="col"><i>No.</i></th>
            <th scope="col"><i>Kode Buku</i></th>
            <th scope="col"><i>Judul</i></th>
            <th scope="col"><i>Penerbit</i></th>
            <th scope="col"><i>Tahun Penerbit</i></th>
            <th scope="col"><i>Cover</i></th>
            <th scope="col"><i>Tindakan</i></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $key => $item )
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $item->book_code }}</td>
            <td>{{ $item->tittle }}</td>
            <td>{{ $item->publisher }}</td>
            <td>{{ $item->publisher_year }}</td>
            <td><img width="50px" height="70px" src="{{ asset ('storage/'.$item->cover) }}" alt="fesfh"></td>
            <td>
                <a href="{{ route('edit-book', $item->id) }}" class="btn btn-primary">Edit</a>
                <form style="display: inline" action="{{ route('delete-book', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
