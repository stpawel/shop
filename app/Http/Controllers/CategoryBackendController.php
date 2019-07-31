<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use App\Category;

class CategoryBackendController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.list',['categories' =>$categories]);
    }
    
    public function add()
    {
        return view('backend.category.add');
    }
    
    public function create(CreateCategory $request)
    {    
        
        $href = Category::convPlInEng($request->input('name'));
        
        $category = new Category;
        $category->name = $request->input('name');
        $category->href = $href;
        $category->save();
        
        return redirect()->action('CategoryBackendController@index');
    }
    
    public function edit($id)
    {
        $category=Category::find($id);
        
        return view('backend.category.edit',['category' => $category]);
    }
    
    public function update(UpdateCategory $request)
    {
        $href = Category::convPlInEng($request->input('name'));
        
        $category = Category::find($request->input('id'));
        $category->name = $request->input('name');
        $category->href=$href;
        $category->save();
        
        return redirect()->action('CategoryBackendController@index');
    }
    
    public function delete($id)
    {
        Category::destroy($id);
        
        return redirect()->action('CategoryBackendController@index');
    }
    
    
}
