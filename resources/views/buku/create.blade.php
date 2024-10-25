@extends('layout.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Buku
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Input kembali.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form method="POST" action="{{ route('buku.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="judul" class="form-control" id="title" placeholder="Masukkan Judul Buku" required>
                    </div>
                    <div class="form-group">
                        <label for="writer">Penulis</label>
                        <input type="text" name="penulis" class="form-control" id="writer" placeholder="Masukkan Nama Penulis" required>
                    </div>
                    <div class="form-group">
                        <label for="publisher">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="publisher" placeholder="Masukkan Nama Penerbit" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
