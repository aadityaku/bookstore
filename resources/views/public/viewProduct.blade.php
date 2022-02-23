@extends('public/base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ asset("products/". $product->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-9">
                        <table class="table">
                            <tr>
                                <th>title</th>
                                <td>{{ $product->title }}</td>
                            </tr>
                            <tr>
                                <th>Author</th>
                                <td>{{ $product->author }}</td>
                            </tr>
                            <tr>
                                <th>category</th>
                                <td>{{ $product->category->cat_title }}</td>
                            </tr>
                            <tr>
                                <th>ISBN</th>
                                <td>{{ $product->ISBN }}</td>
                            </tr>
                            <tr>
                                <th>No of Page</th>
                                <td>{{ $product->nop }}</td>
                            </tr>
                        </table>

                        <a href="{{ route('public.addToCart', ['id'=> $product->id]) }}" class="btn btn-success btn-lg"><i class="bi bi-cart"></i> Add To Cart</a>
                        <a href="" class="btn btn-warning btn-lg">Buy Now</a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                    <div class="card  border border-primary">
                        <div class="card-header bg-primary text-white">
                                Description
                        </div>
                        <div class="card-body">
                            <p class="lead">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection