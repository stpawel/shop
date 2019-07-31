<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUser;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdatePassword;

class UserFrontedController extends Controller
{
    public function index(){
        
        return view('fronted.register.add');
    }
    
    public function create(CreateUser $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->surname = $request->input('surname');
        $user->street = $request->input('street');
        $user->number = $request->input('number');
        $user->postcode = $request->input('postcode');
        $user->city = $request->input('city');
        $user->phone = $request->input('phone');
        $user->status = 'Client';
        $user->save();
        
        return view('fronted.register.message');
    }
    
    public function edit()
    {
        //echo auth()->user()->id;
        $user=User::find(auth()->user()->id);
        
        return view('fronted.profil.edit',['user' => $user]);
        
    }
    
    public function update(UpdateUser $request)
    {
        
        $user = User::find(auth()->user()->id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->street = $request->input('street');
        $user->number = $request->input('number');
        $user->postcode = $request->input('postcode');
        $user->city = $request->input('city');
        $user->phone = $request->input('phone');
        $user->save();
        
        return back();
    }
    
    public function newpassword()
    {
        return view('fronted.password.new');
    }
    
    public function updatepassword(UpdatePassword $request)
    {
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        
        return back();
    }
    
    
    
    
}
