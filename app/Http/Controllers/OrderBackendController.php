<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Sum;
class OrderBackendController extends Controller
{
    public function index()
    {
        $orders = DB::select('select name, surname, street,number, postcode, city, phone,s.id as id,invoice, total, s.created_at as date from users u,sums s where u.id=s.user_id and position=1');
        return  view('backend.order.list',['orders' =>$orders]);
    }
    
    public function show($id)
    {
       $books = DB::select('select title, amount, price, sum from orders where sum_id='.$id);
       return view('backend.order.listbooks',['books' =>$books]);
    }
    
    public function update($id)
    {
        $sum = Sum::find($id);
        $sum->position = 2;
        $sum->save();
        
        return back();
    }
    
    public function sent()
    {
        $orders = DB::select('select name, surname, street,number, postcode, city, phone,s.id as id,invoice, total, s.created_at as date from users u,sums s where u.id=s.user_id and position=2');
        return  view('backend.order.listsent',['orders' =>$orders]);
    }
    
    
}
