@extends('admin/base')

@section('content')

<div class="row">
    <div class="col-8">
        <table class="table">
            <tr>
                <th>Coupon Id</th>
                <th>Coupon Code</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            @foreach ($coupon as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->code}}</td>
                    <td>{{$item->amount}}</td>
                    <td>
                        <a href="" class="btn btn-danger">X</a>
                        <a href="" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('coupon.store') }}" method="POST">
                    @csrf
                   <div class="mb-3">
                       <label for="">Coupon Code</label>
                       <input type="text" name="code" class="form-control">
                   </div>
                   <div class="mb-3">
                       <label for="">Amount</label>
                       <input type="text" name="amount" class="form-control">
                   </div>
                   <div class="mb-3">
                       <input type="submit"  class="btn btn-success">
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection