@extends('public/base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                   @foreach ($category as $item)
                   <a href="{{ route('public.catfilter',["id"=>$item->id]) }}" class="list-group-item list-group-item-action">{{ $item->cat_title }}</a>    
                   @endforeach
                   
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                   @foreach ($products as $item)
                   <div class="col-3">
                    <div class="card mb-3">
                        <img src="{{ asset("products/".$item->image) }}" class="w-100" style="object-fit: cover;height:280px" alt="">
                        <div class="card-body">
                            <h6 class="text-truncate">{{ $item->title }}</h6>
                            <small class="text-muted">{{ $item->author }}</small>
                            @if ($item->discount_price)
                            <h5>₹{{ $item->discount_price }}/- <del class="text-muted">₹{{ $item->price }}/-</del></h5>

                            @else 
                            <h5>₹{{ $item->price }}/-</h5>
                            @endif

                            <a href="{{ route("public.product.view", ['pro_id'=> $item->id]) }}" class="btn btn-success btn-sm">View Book</a>
                        </div>
                    </div>
                </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection