@extends('public.base')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route("public.checkout") }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">contact</label>
                                <input type="text" name="contact" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">area</label>
                                <input type="text" name="area" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">street</label>
                                <input type="text" name="streat" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">city</label>
                                <input type="text" name="city" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">state</label>
                                <input type="text" name="state" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">pincode</label>
                                <input type="text" name="pincoe" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Type</label>
                                <input type="radio" name="type" class="form-input-check" value="office">
                                <label for="">Office</label>
                                <input type="radio" name="type" class="form-input-check" value="home" checked>
                                <label for="">home</label>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Payment Now" class="btn btn-primary w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection