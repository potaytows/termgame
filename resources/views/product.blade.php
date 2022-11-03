@extends('layouts.app')
@section('title','Product')

@section('content')

<div class="container"> 
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($product as $item)
            <li class="breadcrumb-item"><a href="/home">Home</a></li> 
            <li class="breadcrumb-item active" aria-current="page">{{$item->game->game_name}}</li>
            <li class="breadcrumb-item active" aria-current="page">{{$item->product_name}}</li>
            @endforeach
          
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
              @foreach ($product as $item)
              <b>รหัสสินค้า</b> : <input class="m-2" type="number" name="product_id"  value="{{$item->id}}" style="border:none;background-color:transparent;"readonly><br>
              <b>ชื่อสินค้า</b> : {{$item->product_name}}<br>
              <b>ราคา</b> : {{$item->price}}<br>
              <b>มีสินค้าทั้งหมด</b> : {{$codecount}} ชิ้น 
              @endforeach    
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
    
</div>
@endsection