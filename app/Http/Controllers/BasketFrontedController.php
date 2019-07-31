<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use App\Book;
use Illuminate\Support\Facades\Auth;

class BasketFrontedController extends Controller
{
    public function add(Request $request)
    {
       
        $book = Book::find($request->input('id'));
        $amount=$request->input('amount');
        
        \Cart::add($book->id, $book->title, $book->price, $amount);
        
        return back();
    }
    
    public function index() {
         
        $cart = \Cart::getContent();
        $total = \Cart::getTotal();
        $total_quantity = \Cart::getTotalQuantity();
        
        return view('fronted.basket.list',['cart' =>$cart,
                                        'total'=>$total,
                                        'total_qauntity'=>$total_quantity,
                                        ]);
    }
    
    public function delete($id)
    {
        \Cart::remove($id);
        
        return back();
    }
}
