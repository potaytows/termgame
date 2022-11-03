@extends('layouts.app')
@section('title','')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li> 
              <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
          </nav>
        
            <div class="row mb-5">
                @if (count($products)==0)
                เกมนี้ยังไม่มีสินค้าใดๆเลย!
                @else
                @foreach ($products as $product)
                <div class="col-md-3 mt-5" style="width:19.5rem; height:10rem;">
                    <div class="card " >
                    <div class="card-body new_product_box">
                        <h5 class="card-title" style="height: 3rem;"><b>{{$product->product_name}} <span class="badge bg-info">New!</span></b></h5>
                        <p class="card-text">{{$product->price}}.00 บาท </p>
                        <a href="/home/product/{{$product->id}}" class="btn new_color_button">ซื้อเลย</a>
                    </div>
                    </div>
                </div>
                @endforeach

                @endif
              
                
            </div>
    </div>

@endsection
