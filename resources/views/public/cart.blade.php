@extends('public.base')

@section('content')
    <div class="container">
        
        <div class="row">
            <div class="col-12">
                
                <h3 class="h3 fw-bold">My Cart ({{ $count }})</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                @php
                    $total_amount = 0;
                    $total_payable_amount = 0;
                    $total_actual_amount = 0;
                    $total_discount_amount = 0;
                    $tax = 0;
                @endphp
                @if($order->address_id != NULL)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h5>{{ $order->address->name}},{{ $order->address->contact}},{{ $order->address->area}}</h5>
                                <h5>{{ $order->address->city}},{{ $order->address->streat}},{{ $order->address->pincoe}}</h5>

                            </div>
                            <div class="col-4 mt-3">
                                <a href="" class="btn btn-warning">Change Address</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @foreach ($order->orderitem as $item)


                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                         
                            <div class="col-2">
                                <img src="{{ asset("products/".$item->product->image) }}" width="100%" alt="">
                            </div>
                            <div class="col">
                                <h2 class="card-title">{{ $item->product->title }}</h2>
                              
                                <div class="mb-3">
                                    <small class="small text-muted">{{ $item->product->category->cat_title }}</small>
                                </div>

                                <a href="{{ route("public.removeFromCart", ['id'=> $item->product->id]) }}" class="btn btn-danger fw-bold h4">-</a>
                                <span>{{ $item->qty }}</span>
                                <a href="{{ route('public.addToCart', ['id' => $item->product->id]) }}" class="btn btn-success fw-bold h4">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $total_amount += $item->product->price * $item->qty;
                    $total_actual_amount += $item->product->discount_price * $item->qty;
                    $tax = $total_amount * 0.12;
                   
                    $total_payable_amount = $total_actual_amount + $tax;
                    if($order->coupon_id != NULL){
                        $total_payable_amount = $total_actual_amount + $tax;
                        $total_payable_amount  = $total_payable_amount - $order->coupon->amount;     
                    } 
                    $total_discount_amount =$total_amount- $total_actual_amount ;
                @endphp

                @endforeach
            </div>
            <div class="col-4">



                <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action fw-bold">Total Amount<span class="text-danger">(MRP)</span><span class="float-end">₹{{$total_amount}}/-</span></li>
                    <li class="list-group-item list-group-item-action">Total TAX (18% GST) <span class="float-end">+₹{{ $tax }}/-</span></li>
                    <li class="list-group-item list-group-item-action bg-success text-white">Discount Amount <span class="float-end"> - ₹{{ $total_discount_amount }}/-</span></li>
                    @if ($order->coupon_id)
                    <li class="list-group-item list-group-item-action bg-warning">Coupon Discount (<small class="small">{{ $order->coupon->code }}</small>)<span class="float-end">- ₹{{ $order->coupon->amount }}/-</span></li>
                    
                    <a href="{{ route('public.removeCoupon') }}" class="badge bg-danger text-white text-decoration-none">Remove</a>
                    @endif
                    <li class="list-group-item list-group-item-action h5 fw-bolder">Payment Amount <span class="float-end">₹{{ $total_payable_amount }}/-</span></li>
                </ul>
                <div class="row g-1 mt-4">
                    <div class="col-6">
                        <a href="{{ route('public.home') }}" class="btn btn-warning w-100 btn-lg">More Shopping</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('public.checkout') }}" class="btn btn-success w-100 btn-lg">Checkout</a>
                    </div>
                </div>

                @if (!$order->coupon_id)
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route("public.addCoupon") }}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="text" name="code" class="form-control" placeholder="Enter Coupon Code">
                                    <input type="submit" class="btn btn-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endif
            </div>
        </div>
    </div>
@endsection