@extends('admin.base')

@section('content')
        <div class="row">
            <div class="col-8">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>id</th>
                        <th>Category title</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($category as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->cat_title }}</td>
                            <td>
                                <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="lead">Create Categroy</h6>
                        <form action="{{ route("category.store") }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Category title</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection