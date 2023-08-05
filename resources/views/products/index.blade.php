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
        <h4>Menu Produk</h4>
    </div>

    <div class="my-3 d-flex justify-content-between">
        <a href="{{ route('categories.index') }}" class="btn btn-info text-white ">Menu Kategori</a>        
        <a class="btn btn-success" href="{{ route('products.create') }}"> Tambah Produk</a>
    </div>

    <table class="table rounded-3 shadow-sm">
          <thead class="bg-secondary border border-bottom border-secondary text-white">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Kategori</th>
                <th scope="col"></th>
              </tr>
          </thead>
          <tbody>

            <?php $no=1;?>
            @foreach ($products as $product)
              <tr>

                  <th scope="row">{{ $no }}</th>
                  <td> {{ $product->name }}</td>
                  <td> {{ $product->price }}</td>
                  <td> {{ $product->category->name }}</td>

                  <td class="w-25">
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Ubah</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                  </td>
              </tr>
              <?php $no++ ;?>
            @endforeach

          </tbody>
    </table>
    <div class="my-3 text-end">
        {!! $products->links() !!}
    </div>
</div>

@endsection