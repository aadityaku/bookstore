@extends('admin/base')


@section('content')
    <div class="container-fluid">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h6 class="lead">Create product here</h6>
                <form action="{{ route('product.store') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">author</label>
                        <input type="text" name="author" class="form-control">
                        @error('author')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">category_id</label>
                        <select name="category_id" class="form-select">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->cat_title }}</option>
                                @endforeach
                        </select>
                        @error('category_id')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">price</label>
                        <input type="text" name="price" class="form-control">
                        @error('price')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">discount_price</label>
                        <input type="text" name="discount_price" class="form-control">
                        @error('discount_price')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">No of Page</label>
                        <input type="number" name="nop" class="form-control">
                        @error('nop')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">description</label>
                        <textarea rows="5" name="description" class="form-control"></textarea>
                        @error('description')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">ISBN</label>
                        <input type="text" name="ISBN" class="form-control">
                        @error('ISBN')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Create Product" class="btn btn-success w-100">
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection