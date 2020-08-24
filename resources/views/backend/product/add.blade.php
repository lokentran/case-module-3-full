@extends('backend.master.master')

@section('title','Thêm sản phẩm')

@section('content')
    <div class="container-fluid">
        <form class="mt-5" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" name="name">
                @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
           
            </div>

            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" class="form-control" name="price">
                @if ($errors->has('price'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('price') }}</strong>
                </div>
            @endif
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="140" rows="5"></textarea>
                @if ($errors->has('description'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('description') }}</strong>
                </div>
            @endif
            </div>

            <div class="form-group">
                <label for="">Category</label>
                <select class="custom-select custom-select-md mb-3" name="category_id" id="">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

        
            <label for="">Produc Image</label>
            <div>
                <input type="file" class="form-control" name="image">
            </div>
                
            <button class="mt-3 mb-5 btn btn-primary" type="submit">Add Product</button>

        </form>
    </div>

@endsection