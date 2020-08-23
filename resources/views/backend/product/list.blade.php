@extends('backend.master.master')

@section('title','Danh sách sản phẩm')

@section('content')
    <div class="container-fluid mt-5">
        <a class="btn btn-secondary" href="{{ route('products.create') }}">Thêm sản phẩm</a>
        <table class="table table-striped" >
            <thead>
                <tr>
                    <th>Số TT</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Mô tả sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Xử lí</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($products as $key => $product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img src="{{ asset('/storage/'.$product->img) }}" alt=""></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category->name }}</td>
       
                        <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a></td>
                    </tr>
                @empty
                    <tr>
                        <td>No Data</td>
                    </tr>
                @endforelse
       

            </tbody>

        </table>
    </div>
@endsection