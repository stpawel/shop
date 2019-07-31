<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Book;
use App\Category;
use App\Photo;

class BookFrontedController extends Controller
{
    
    
    public function index()
    {
        $books = DB::select('select b.id id, title, href, price, src from books b, photos p where b.id=p.book_id');
        
        $categories = Category::all();
        
        return view('fronted.book.list',['books' =>$books,
                                        'categories'=>$categories]);
    }
    
    public function show($href)
    {
        $books = DB::select('select b.id id, title, b.href href, price, src from categories c, books b, photos p where c.id=b.category_id and b.id=p.book_id and c.href="'.$href.'"');
        
        $categories = Category::all();
        
        return view('fronted.book.list',['books' =>$books,
                                        'categories'=>$categories]);
    }
    
    public function showbook($href,$id)
    {
      
        $books = DB::select('select b.id id, title, price, author, description, p.src src from books b, photos p where b.id=p.book_id and b.id='.$id);
        
        $categories = Category::all();
        
        return view('fronted.book.book',['books' =>$books,
                                        'categories'=>$categories]);
    }
    
}
