<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public function product(){
        return $this->hasOne(Product::class,"id","product_id");
    }
    public function address(){
        return $this->hasOne(
            Address::class,"id","user_id"
        );
    }
    // public function order_id(){
    //     return $this->hasOne(
    //         Order::class,"id","order_id"
    //     );
    // }
}
