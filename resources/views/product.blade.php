@extends('layouts.app')
@section('title','Product')

@section('content')

<div class="container"> 
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li> 
            <li class="breadcrumb-item active" aria-current="page">{{$product->game->game_name}}</li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->product_name}}</li>      
        </ol>
      </nav>
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
    
    @endif
   
    <div class="row bg-light p-2 border text-center">
        <form action="/home/product/doBuy" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
             
              <b>รหัสสินค้า</b> : <input class="m-2" type="number" name="product_id"  value="{{$product->id}}" style="border:none;background-color:transparent;"readonly><br>
              <b>ชื่อสินค้า</b> : {{$product->product_name}}<br>
              <b>ราคา</b> : {{$product->price}}<br>
              <b>มีสินค้าทั้งหมด</b> : {{$codecount}} ชิ้น 
                
            <br>
            @if ($codecount==0)
            <button type="submit" class="btn btn-success" disabled>สินค้าหมด</button>
            @else
            <!-- Button trigger modal -->
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalBuy">
            ซื้อเลย
            </button>
    
            @endif
          </div>
          <br>
        </form>
      
  </div>
  <hr>
  <h4>Comments</h4>
  <form action="/home/product/{{$product->id}}/addcomment" method="post">
    @csrf
  <input type="text" name="comment" >
  <button type="submit">Comment</button>
  </form>
  @foreach ($product->usersComment as $comment)
  <div class="usercomment container-fluid">
    <div><img src="{{asset('userpfp/'.$comment->user->user_pfp)}}" class="commentpfp" alt="user_pfp"></div>
    <div class="contentnUserName">
      <b>{{$comment->user->name}}</b>
      <p class="contentcom">{{$comment->comment}}</p>
    
    </div>
    
  </div>
  
  @endforeach
</div>
@endsection