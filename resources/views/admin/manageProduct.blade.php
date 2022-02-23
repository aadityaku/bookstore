@extends('admin.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h6 class="lead float-start">Manage Products</h6>

                <a href="{{ route('product.create') }}" class="btn btn-success float-end">Insert Product</a>
            </div>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>author</th>
                    <th>category</th>
                    <th>price</th>
                    <th>image</th>
                    <th>ISBN</th>
                    <th>NOP</th>
                    <th>action</th>
                </tr>
                @foreach ($products as $pro)
                    <tr>
                        <td>{{ $pro->id }}</td>
                        <td>{{ $pro->title }}</td>
                        <td>{{ $pro->author }}</td>
                        <td>{{ $pro->category->cat_title }}</td>
                        <td>₹{{ $pro->discount_price }} <del class="text-danger">₹ {{ $pro->price }}</del></td>
                        <td><img src="{{ asset("products/". $pro->image) }}" width="50px" alt=""></td>
                        <td>{{ $pro->ISBN }}</td>
                        <td>{{ $pro->nop }}</td>
                        <td>
                            <a href="" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                            <a href="" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                            <a href="" class="btn btn-success"><i class="bi bi-eye"></i></a>
                            <a href="" class="btn btn-warning"><i class="bi bi-send"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection