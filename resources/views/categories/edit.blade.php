@extends('layout')
@section('content')

    <div class="my-1 text-center">
        <h3>Ubah Kategori</h3>
    </div>

    @if (session('status'))
            <div class="alert alert-success my-1">
                {{ session('status') }}
            </div>
    @endif

    <div class="d-flex justify-content-center my-5 px-4">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" 
            class="w-50 shadow rounded-3 p-4">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <a class="btn btn-secondary" href="{{ route('categories.index') }}" enctype="multipart/form-data">Batal</a>                
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>

@endsection