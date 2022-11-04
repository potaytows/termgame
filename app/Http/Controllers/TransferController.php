<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product_detail;
use App\Models\bill;
use App\Models\userRequest;
use App\Models\game;
use App\Models\transaction;
use App\Models\product;
use App\Models\usersComment;

class TransferController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function balanceIncrement(Request $request)
     {
        $account = User::find($request->user_id);
            \DB::transaction(function () use($request,$account) {
                transaction::create([
                    'user_id' => $request->user_id,
                    'amount' => $request->req_amount,
                ]);
                $account->increment('balance',$request->req_amount);
                $account->save();
                $lasttrans = transaction::orderBy('created_at','DESC')->first();
                $userRe = userRequest::find($request->req_id);
                $userRe->status=2;
                $userRe->transaction_id=$lasttrans->id;
                $userRe->save();
                
            });
           
            return redirect('/admin/adminTopup')->with('success','Approved request!');
    
        }
        public function denyReq(Request $request){
            $req = userRequest::find($request->req_id);
            $req->status=1;
            $req->save();
            return redirect('/admin/adminTopup')->with('success','Deleted Request!');


        }

    public function saveReq(Request $request){
        $this->validate($request, [
            'slip' => 'mimes:jpeg,png,bmp,tiff,jpg |max:4096',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'รองรับเฉพาะไฟล์ JPEG,JPG,PNG,BMP.'
            ]
        );



        $req = new userRequest();
        $req->user_id = $request->input('user_id');
        $req->status = 0;
        $req->reqamount = $request->input('reqamount');
        if($request->hasfile('slip')){
            $file = $request->file('slip');
            $extention = $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('uploads/',$filename);
            $req->slip_image = $filename;
        } 
        $req->save();
        return redirect()->back()->with('status','Added');

    }
    
    public function doBuy(Request $request){
        $code = product::where([['product_detail_id','=',$request->product_id],['user_id','=',null]])->first();
        $user = User::find(Auth()->User()->id);

        
        if ($user->balance >= $code->product_detail->price){
            \DB::transaction(function () use($code,$user,$request) {
                $code->user_id=$user->id;
                $code->save();
                bill::create([
                    'totalprice' => $code->product_detail->price,
                    'user_id' => Auth()->User()->id,
                    'product_id' => $code->id,
                ]);
                $user->decrement('balance',$code->product_detail->price);
                $user->save();
                
                
            });
            
        }else{
            return redirect('/home/request')->with('error','เงินของคุณไม่พอ!! กรุณาเติมเงิน');
        }
        return redirect('/home/myitem')->with('success','Succesfully bought a product!!');
    
    }

    public function doAdd(Request $request){
        $codes = new product();
        $codes->product_detail_id = $request->product_id;
        $codes->code = $request->input_code;
        $codes->save();
        return redirect('/admin/addCode')->with('success','เพิ่มสินค้าแล้วเรียบร้อย!!');
    }
    public function doDel($id){
        product_detail::destroy($id);
        return redirect('/admin/addCode')->with('success','ลบสินค้าแล้วเรียบร้อย!!');
    }
    public function doDelgame($id){
        game::destroy($id);
        return redirect('/admin/addCode')->with('success','ลบสินค้าแล้วเรียบร้อย!!');
    }
    public function doDelProd($id){
        product::destroy($id);
        return redirect('/admin/addCode')->with('success','ลบสินค้าแล้วเรียบร้อย!!');
    }
    public function doAddPro(Request $request){
        $pdt = new product_detail();
        $pdt->game_id=$request->game_id;
        $pdt->product_name=$request->product_name;
        $pdt->price = $request->product_price;
        $pdt->save();
        return redirect('/admin/addCode')->with('success','เพิ่มสินค้าแล้วเรียบร้อย!!');
    }
    public function doAddGame(Request $request){
        $game = new game();
        $game->game_name = $request->game_name;
        $game->detail = $request->game_detail;
        if($request->hasfile('game_img')){
            $file = $request->file('game_img');
            $extention = $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('game_thumb/',$filename);
            $game->game_thmb = $filename;
        } 
        $game->save();
        return redirect('/admin/addCode')->with('success','เพิ่มเกมแล้วเรียบร้อย!!');
    }

    public function doEditProfile(Request $request){
        // dd($request);
        $user = User::find(Auth()->User()->id);
        if ($request->newname == null){

        }else{
            $user->name = $request->newname;
        }
        if ($request->newpfp == null){

        }else{
            if($request->hasfile('newpfp')){
                $file = $request->file('newpfp');
                $extention = $file->getClientOriginalExtension();
                $filename= time().'.'.$extention;
                $file->move('userpfp/',$filename);
                $user->user_pfp = $filename;
            } 
        }
        if ($request->newgender == null){
            
        }else{
            $user->gender= $request->newgender;
        }
        
        $user->save();
        return redirect('/home/profile')->with('success','เปลี่ยนข้อมูลแล้ว');
    }
    public function addComment($id,Request $request){
        $product = product_detail::where('id','=',$id)->first();
        $code = product::where([['product_detail_id','=',$id],['user_id','=',null]])->get();
        $codecount = $code->count();
        // ^ From HomeController 
        $prod = product_detail::where('id','=',$id)->first();
        $newcom = new usersComment();
        $newcom->user_id = Auth()->User()->id;
        $newcom->comment = $request->comment;
        $newcom->product_detail_id = $prod->id;
        $newcom->save();
        
        return redirect('/home/product/'.$id)->with('product','code','codecount');
        // return view('product',compact('codecount','product'));
        


    }
}
