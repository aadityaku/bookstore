@extends('admin/base')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>streat</th>
                    <th>city</th>
                    <th>State</th>
                    <th>Pincode</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                @foreach ($address as $item)
                    <tr>
                        <td>{{$item->user_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->contact}}</td>
                        <td>{{$item->address->email}}</td>
                        <td>{{$item->streat}}</td>
                        <td>{{$item->city}}</td>
                        <td>{{$item->state}}</td>
                        <td>{{$item->pincoe}}</td>
                        <td>{{$item->type}}</td>
                        <td>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection