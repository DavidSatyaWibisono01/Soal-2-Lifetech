@extends('layout')
@section('content')

    <div class="my-1 text-center">
        <h3>Tambah Produk</h3>
    </div>

    @if (session('status'))
            <div class="alert alert-success my-1">
                {{ session('status') }}
            </div>
    @endif

    <div class="d-flex justify-content-center my-5 px-4">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
            class="w-50 shadow rounded-3 p-4">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="David Satya Wibisono">
                @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Harga</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Masukkan Harga">

                @error('price')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Kategori</label>
                <!--<input type="text" class="form-control" id="id_category" name="id_category" placeholder="Preço"> -->
                <select class="form-select" name="id_category">
                    <option selected disabled>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                @error('id_category')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <a class="btn btn-secondary" href="{{ route('products.index') }}" enctype="multipart/form-data">Cancel</a>                
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>

@endsection