@extends('layout.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Buku
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Terjadi kesalahan!<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('buku.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Menggunakan PUT untuk update -->
                    
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" name="judul" class="form-control" value="{{ old('judul', $book->judul) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="penulis">Penulis:</label>
                        <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $book->penulis) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="penerbit">Penerbit:</label>
                        <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit', $book->penerbit) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
