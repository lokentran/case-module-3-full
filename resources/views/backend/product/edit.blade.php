@extends('backend.master.master')

@section('title','Sửa sản phẩm')

@section('content')
    <div class="container-fluid">
        <form class="mt-5" action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" class="form-control" name="price" value="{{ $product->price }}">
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="140" rows="5">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Category</label>
                <select class="custom-select custom-select-md mb-3" name="category_id" id="">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            @if ($category->id == $product->id)
                                selected
                            @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>


        
            <label for="">Product Image</label>
            <div>
                <input type="file" class="form-control" name="image">
            </div>
                
            <button class="mt-3 mb-5 btn btn-primary" type="submit">Update</button>

        </form>
    </div>

@endsection