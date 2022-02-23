<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Coupon;
use App\Models\Address;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
   
        $data = [
            'category' => Category::all(),
            'products' => Product::all(),
       
        ];
        return view("public/home",$data);
    }
    public function search(Request $req){
        $search = $req->search;
        $data = [
            'category' => Category::all(),
            'products' => Product::where([["isbn","$search"]])->get(),
            'products' => Product::where([["author","LIKE","%$search%"]])->get(),
            'products' => Product::where([["title","LIKE","%$search%"]])->get(),
        ];
        return view("public/home",$data);
    }
    public function catfilter(Request $req,$id){
        
        $data = [
            'category' => Category::all(),
            'products' => Product::where([['category_id',$id]])->get(),
        ];
        return view("public/home",$data);
    }

    public function productView($pro_id){
        $data = [
            'product' => Product::find($pro_id)
        ];
        return view("public/viewProduct",$data);
    }

    public function addToCart(Request $req, $id){
        $product = Product::find($id);
        $user = Auth::user();
        
        if($product){
            $order = Order::where([["ordered",false],["user_id",$user->id]])->first();
            
            if($order){
                // if exist order
                $orderItem = OrderItem::where([["ordered",false],["user_id",$user->id],["order_id",$order->id],['product_id',$product->id]])->first();
                
                if($orderItem){
                    // if orderitem exist then qty increment
                    $orderItem->qty += 1;
                    $orderItem->save();
                }
                else{
                    // create new orderitem record
                    $oi = new OrderItem();
                    $oi->ordered = false;
                    $oi->user_id = $user->id;
                    $oi->product_id = $product->id;
                    $oi->order_id = $order->id;
                    $oi->save();
                }
            }
            else{
                // if order not exist
                $o = new Order();
                $o->ordered = false;
                $o->user_id = $user->id;
                $o->save();

                $oi = new OrderItem();
                $oi->ordered = false;
                $oi->user_id = $user->id;
                $oi->product_id = $id;
                $oi->order_id = $o->id;
                $oi->save();
            }

            return redirect()->route("public.cart");
        }
        else{
            // if product not found
            return redirect()->back();
        }
    }
    public function cartSummary(){
       
        $data['order']  = Order::where([['user_id', Auth::id()],["ordered",false]])->first();
        $data['count'] = count($data['order']->orderitem);
        // $order=Order::where(["user_id",Auth::id()]);
        
        return view("public/cart",$data);
      

        
    }
    public function removeFromCart(Request $req, $id){
        $product = Product::find($id);
        $user = Auth::user();

        if($product){
            $order = Order::where([["ordered",false],["user_id",$user->id]])->first();

            if($order){
                // if exist order
                $orderItem = OrderItem::where([['ordered',false],["user_id",$user->id],["order_id",$order->id],['product_id',$product->id]])->first();

                if($orderItem){
                    // if orderitem exist then qty increment
                    if($orderItem->qty > 1){
                    $orderItem->qty -= 1;
                    $orderItem->save();
                }
                else{
                        // create new orderitem record
                        $orderItem->delete();
                    }
                }
               
            }

            return redirect()->back();
        }
        else{
            // if product not found
            return redirect()->back();
        }
    }

    public function checkCoupon($code){
        $code = Coupon::where([["code", $code],["status",true]])->first();

        return $code;
    }

    public function removeCoupon(Request $req){
        $user = Auth::user();

                $order = Order::where([["ordered",false],["user_id", $user->id],['coupon_id','!=',NULL]])->first();
                if($order){
                    $order->coupon_id = NULL;
                    $order->save();
                }
                else{
                    echo "order not found";
                }
           
        return redirect()->route("public.cart");
    }
    public function addCoupon(Request $req){
        $user = Auth::user();

        if($req->method() == "POST"){
            $code = $req->code;

            $check  = $this->checkCoupon($code);
            
            if($check){
                $order = Order::where([["ordered",false],["user_id", $user->id]])->first();
                if($order){
                    $order->coupon_id = $check->id;
                    $order->save();
                }
                else{
                    echo "order not found";
                }
            }
            else{
                // if code invalid
                echo "your code is invalid please try a valid code";
            }

        }

        return redirect()->route("public.cart");

    }

    public function paymentDone($order){

        foreach ($order->orderitem as $item) {
            $item->ordered = true;
            $item->save();
        }

        $order->ordered = true;
        $order->save();

    }
    public function checkout(Request $req){

        if($req->method() == "POST"){
            // insert address 
            $user = Auth::user();
            $order = Order::where([["ordered",false],["user_id", $user->id]])->first();

            $addr = new Address();
            $addr->user_id = $user->id;
            $addr->area = $req->area;
            $addr->name = $req->name;
            $addr->contact = $req->contact;
            $addr->streat = $req->streat;
            $addr->city = $req->city;
            $addr->pincoe = $req->pincoe;
            $addr->type = $req->type;
            $addr->state = $req->state;
            $addr->save();

            $order->address_id = $addr->id;
            $order->save();

            $this->paymentDone($order);

            return redirect()->route("public.home");

        }

        return view("public/checkout");
    }
}
