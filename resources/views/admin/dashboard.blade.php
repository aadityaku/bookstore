@extends("admin/base")

@section('content')
 <div class="row">
            <div class="col-4">
                <div class="card mb-3 bg-primary text-white">
                    <div class="card-body">
                        <h1 class="display-6">{{$count}}</h1>
                        <h6>Total Products</h6>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-3 bg-danger text-white">
                    <div class="card-body">
                        <h1 class="display-6">{{$countorder}}</h1>
                        <h6>Total Order</h6>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-3 bg-success text-white">
                    <div class="card-body">
                        <h1 class="display-6">{{$countcategory}}</h1>
                        <h6>Total Category</h6>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-3 bg-warning">
                    <div class="card-body">
                        <h1 class="display-6">{{$countcoupon}}</h1>
                        <h6>Total Coupons</h6>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-3 bg-dark text-white">
                    <div class="card-body">
                        <h1 class="display-6">{{$countuser}}</h1>
                        <h6>Total Users</h6>
                    </div>
                </div>
            </div>
        </div>
          
@endsection