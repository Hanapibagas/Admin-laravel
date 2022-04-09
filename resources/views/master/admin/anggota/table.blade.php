@extends('master.index')

@section('content')
<div class="row">
    <a href="{{ route('create-member') }}" class="btn btn-primary">Tambah</a>
</div>
<table class="table mt-3">
    <thead class="table table-dark table-striped">
        <tr>
            <th scope="col"><i>No.</i></th>
            <th scope="col"><i>Kode Angoota</i></th>
            <th scope="col"><i>Nama</i></th>
            <th scope="col"><i>Amalat</i></th>
            <th scope="col"><i>Jenis kelamin</i></th>
            <th scope="col"><i>Foto</i></th>
            <th scope="col"><i>Tindakan</i></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($member as $key => $item )
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $item->member_code }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->gender }}</td>
            <td><img width="50px" height="70px" src="{{ asset ('storage/'.$item->image) }}" alt="fesfh"></td>
            <td>
                <a href="{{ route('edit-member', $item->id) }}" class="btn btn-primary">Edit</a>
                <form style="display: inline" action="{{ route('delete-member', $item->id) }}" method="POST">
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
