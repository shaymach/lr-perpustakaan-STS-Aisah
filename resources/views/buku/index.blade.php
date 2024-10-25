@extends('layout.layout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-left">
                <h2>Data Buku</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('buku.create') }}">Tambah Buku</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($books as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('buku.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE') <!-- Menggunakan DELETE untuk penghapusan -->
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
