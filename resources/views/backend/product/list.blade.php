@extends('backend.master.master')

@section('title','Product List')

@section('content')
    <div class="container-fluid mt-5">
        <a class="btn btn-secondary mb-3" href="{{ route('products.create') }}">Add Product</a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" >
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Product Price($/Kg)</th>
                                {{-- <th>Description</th> --}}
                                <th>Categories</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
            
                        <tbody>
            
                            @forelse ($products as $key => $product)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><img src="{{ asset('/storage/'.$product->img) }}" alt=""></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    {{-- <td>{{ $product->description }}</td> --}}
                                    <td>{{ $product->category->name }}</td>
                   
                                    <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a></td>
                                    <td><a onclick="return confirm('Are you sure?')" href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Data</td>
                                </tr>
                            @endforelse
                   
            
                        </tbody>
            
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection