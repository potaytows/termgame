@extends('layouts.app')

@section('title','My items')

@section('content')

<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li> 
          <li class="breadcrumb-item active" aria-current="page">สินค้าที่ฉันซื้อ</li>
        </ol>
      </nav>
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ $message }}</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      
      @endif
      <div class="row bg-light border p-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">รหัสของในคลัง</th>
              <th scope="col">รหัสใบเสร็จสั่งซื้อ</th>
              <th scope="col">ชื่อสินค้า</th>
              <th scope="col">ราคา</th>
              <th scope="col">วันที่ซื้อ</th>
              <th scope="col">สินค้า</th>
              
            </tr>
          </thead>
          <tbody>
           <tr>
          @foreach ($items as $item)
            <td>{{$item->id}}</td>
            <td>{{$item->bill->id}}</td>
            <td>{{$item->product_detail->product_name}}</td>
            <td>{{$item->bill->totalprice}}</td>
            <td>{{$item->bill->updated_at}}</td>
            <td>{{$item->code}}</td>
          </tr>
          @endforeach
          </tbody>

        </table>

        
      </div>
      
</div>
@endsection