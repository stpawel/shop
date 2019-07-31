<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Order;
use App\Sum;
use Darryldecode\Cart\Cart;

class OrderFrontedController extends Controller
{
    public function create()
    {
        $cart = \Cart::getContent();
        $total = \Cart::getTotal();
        $total_quantity = \Cart::getTotalQuantity();
       
        $nrinvoice=Sum::nrinvoice();
        
        $sum = new Sum;
        $sum->invoice = $nrinvoice;
        $sum->total=$total;
        $sum->position = 1;
        $sum->user_id=auth()->user()->id;
        $sum->save();
        
        $idSum = DB::table('sums')->max('id');
        
        foreach ($cart as $item) {
            $order = new Order;
            $order->title=$item->name;
            $order->amount=$item->quantity;
            $order->price=$item->price;
            $order->sum=$item->quantity*$item->price;
            $order->sum_id=$idSum;
            $order->user_id=auth()->user()->id;
            $order->save();
        }
        
        \Cart::clear();
        
        return back();
    }
    
    public function index()
    {
        $orders = DB::select('select id,invoice, total, created_at as date from sums where user_id='.auth()->user()->id);
        return view('fronted.order.list',['orders' =>$orders]);
    }
    
    public function show($id)
    {
       $books = DB::select('select title, amount, price, sum from orders where sum_id='.$id);
       return view('fronted.order.listbooks',['books' =>$books]);
    }
}
