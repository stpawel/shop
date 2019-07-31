<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBook;
use App\Http\Requests\UpdateBook;
use App\Book;
use App\Category;
use App\Photo;
use File;


class BookBackendController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $books = Book::all();
        return view('backend.book.list',['books' =>$books]);
    }
    
    public function add()
    {
        $categories = Category::all();
        return view('backend.book.add',['categories' =>$categories]);
    }
    
    public function create(CreateBook $request)
    {
        $href = Book::convPlInEng($request->input('title'));
        
        $book = new Book;
        $book->title = $request->input('title');
        $book->href = $href;
        $book->author=$request->input('author');
        $book->price = $request->input('price');
        $book->description = $request->input('description');
        $book->category_id = $request->input('category');
        $book->save();
        
        if ($request->hasFile('file')){
            
            $bookId = DB::table('books')->max('id');
            
            $file= $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $fileName = time(). '.' . $extension; 
            
            $photo = new Photo();
            $photo->src=$fileName;
            $photo->book_id = $bookId;
            $photo->save();
            
            $img = imagecreatefromjpeg($file);

            $width  = imagesx($img);
            $height = imagesy($img);

            $width_mini = 65;
            $height_mini = 85; 
            $img_mini = imagecreatetruecolor($width_mini, $height_mini);

            imagecopyresampled($img_mini, $img, 0, 0, 0, 0, $width_mini , $height_mini, $width  , $height);
            imagejpeg($img_mini, 'photos/min/'.$fileName."", 80); 
            imagedestroy($img);
            imagedestroy($img_mini);
            
            $file->move('photos/max', $fileName);
        }
        
        
        return redirect()->action('BookBackendController@index');
    }
    
    public function edit($id)
    {
        $isPhoto=1;
        
        $categories = Category::all();
        $book=Book::find($id);
        $photo = DB::table('photos')->where('book_id', $book->id)->first();
        
        if(isset($photo->id)) $isPhoto=1;
        else $isPhoto=0;
                
        return view('backend.book.edit',['book' => $book,
                                          'categories'=>$categories,
                                          'photo'=>$photo,
                                          'isPhoto'=>$isPhoto
                                        ]);
    }
    
    public function update(UpdateBook $request)
    {
        $href = Book::convPlInEng($request->input('title'));
        
        $book = Book::find($request->input('id'));
        $book->title = $request->input('title');
        $book->href=$href;
        $book->author=$request->input('author');
        $book->price = $request->input('price');
        $book->description = $request->input('description');
        $book->category_id = $request->input('category');
        $book->save();
        
        if ($request->hasFile('file')){
            
            $bookId = $request->input('id');
            
            $file= $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $fileName = time(). '.' . $extension; 
            
            $photo = new Photo();
            $photo->src=$fileName;
            $photo->book_id = $bookId;
            $photo->save();
            
            $img = imagecreatefromjpeg($file);

            $width  = imagesx($img);
            $height = imagesy($img);

            $width_mini = 65;
            $height_mini = 85; 
            $img_mini = imagecreatetruecolor($width_mini, $height_mini);

            imagecopyresampled($img_mini, $img, 0, 0, 0, 0, $width_mini , $height_mini, $width  , $height);
            imagejpeg($img_mini, 'photos/min/'.$fileName."", 80); 
            imagedestroy($img);
            imagedestroy($img_mini);
            
            $file->move('photos/max', $fileName);
        }
        
        return redirect()->action('BookBackendController@index');
    }
    
    public function delfile($id,$idfile)
    {
        $photo = Photo::find($idfile);
        
        File::delete('photos/min/' . $photo->src);
        File::delete('photos/max/' . $photo->src);
        
        Photo::destroy($idfile);
        
        return back();
    }
    
    public function delete($id)
    {
        $photo = DB::table('photos')->where('book_id','=', $id)->first();
        
        if(isset($photo)){
            File::delete('photos/min/'.$photo->src);
            File::delete('photos/max/'.$photo->src);
        
            Photo::destroy($photo->id);
        }
        Book::destroy($id);
    
        return redirect()->action('BookBackendController@index');
    }
}
