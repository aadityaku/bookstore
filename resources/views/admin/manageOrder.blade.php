@extends('admin/base')

@section('content')
    <table class="table table-hover">
        <tr>
            <th>User Name</th>
            <th>Product Name</th>
            <th>Address</th>
            <th>Coupon Code</th>
            <th>Card Ammount</th>
            <th>Pay Ammount</th>
        </tr>
       @foreach ($order as $item)
           <tr>
               <td>{{$item->user->name}}</td>
               <td></td>
               <td>{{$item->address->area}},{{$item->address->city}},{{$item->address->pincoe}}</td>
               @if($item->coupon_id != null)
               <td>{{$item->coupon->code}}</td>
               
                   
               @else
                   <td>No Coupon</td>
               @endif
              
           </tr>
       @endforeach
      
    </table>
@endsection