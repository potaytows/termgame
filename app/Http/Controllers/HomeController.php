<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product_detail;
use App\Models\bill;
use App\Models\userRequest;
use App\Models\transaction;
use App\Models\product;
use App\Models\game;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','toProd']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $games= game::all();
        return view('home',compact('games'));
    }
       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $users = User::all();
        return view('adminHome',compact('users'));
    }
    public function adminTopup()
    {
        $reqs = userRequest::all();
        return view('adminTopup',compact('reqs'));
    }
    public function adminAddPro(){
        $games = game::all();
        return view('addGame',compact('games'));

    }
    public function adminCode($id){
        $game = game::where('id','=',$id)->get();
        $prods=product_detail::where('game_id','=',$id)->get();
        return view('admineCode',compact('prods','game'));
    }

    public function toAdd($id)
    {   
        $product = product_detail::where('id','=',$id)->get();
        $codes = product::where('product_detail_id','=',$id)->orderBy('created_at','DESC')->get();
        $prodcount = count($codes);
        $boughtprod = count(product::where([['product_detail_id','=',$id],['user_id','=',null]])->get());
    
        return view('addProd',compact('product','prodcount','codes'));
    }
    public function adminAddGame()
    {   
        $games = game::all();
        return view('adminAddGame',compact('games'));
    }

    public function toProd($id)
    {   
        $products = product_detail::where('game_id','=',$id)->orderBy('price')->get();
        
        return view('userProd',compact('products'));
    }
    public function toEditProfile()
    {   
        $user = User::where('id','=',Auth()->User()->id)->first();
        return view('editprofile',compact('user'));
 
       
    }
    public function toProduct($id)
    {   
        $product = product_detail::where('id','=',$id)->first();
        $code = product::where([['product_detail_id','=',$id],['user_id','=',null]])->get();
        $codecount = $code->count();
        return view('product',compact('codecount','product'));
    }
    public function toProfile(){
        $user = User::where('id','=',Auth()->User()->id)->first();
        return view('profile',compact('user'));
    }
    public function toitem()
    {   
        $items = product::where('user_id','=',Auth()->User()->id)->orderBy('updated_at','DESC')->get();
        return view('myitem',compact('items'));
    }
    public function toRequest(){
        $photos = userRequest::where('user_id','=',Auth()->User()->id)->get();
        return view('request',compact('photos'));
    }
    public function toadminTopup()
    {
        $reqs = UserRequest::orderBy('status','ASC')->get();
        return view('adminTopup',compact('reqs'));
    }
    public function toadminTopuphis(){
        $reqs = userRequest::where('status','=',2)->get();
        
        return view('adminHistory',compact('reqs'));
    }
    public function toApprove($id){
        $reqs = userRequest::find($id);
        return view("approve",compact('reqs'));
        
    }
    public function toDeny($id){
        $reqs = userRequest::find($id);
        return view("deny",compact('reqs'));
        
    }
 


}