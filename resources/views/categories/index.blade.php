@extends('layout')
@section('content')

<div>
    
    <div class="text-center">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

    <div class="my-3 text-center">
        <h4>Menu Kategori</h4>
    </div>

    <div class="my-3 d-flex justify-content-between">
        <a href="{{ route('products.index') }}" class="btn btn-info text-white ">Menu Produk</a>

        <a class="btn btn-success" href="{{ route('categories.create') }}">Tambah Kategori</a>
    </div>

    <table class="table rounded-3 shadow-sm">
          <thead class="bg-secondary border border-bottom border-secondary text-white">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            
            @foreach ($categories as $category)
              <tr>

                  <th scope="row">{{ $category->id }}</th>

                  <td> {{ $category->name }}</td>

                  <td class="w-25">
                    <form action="{{ route('categories.destroy', $category->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Ubah</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                  </td>

              </tr>
            @endforeach

          </tbody>
    </table>
    <div class="my-3 text-end">
        {!! $categories->links() !!}
    </div>
</div>

@endsection