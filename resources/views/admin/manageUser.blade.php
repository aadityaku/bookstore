@extends('admin.base')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                @foreach($user as $item)
                    <tr>
                       <td>{{$item->id}}</td>
                       <td>{{$item->name}}</td>
                       <td>{{$item->email}}</td>
                       <td>
                           <a href="" class="btn btn-danger">X</a>
                       </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection