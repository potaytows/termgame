@extends('layouts.app')
@section('title','Add-Product')

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
        <form action="/admin/code/doAdd" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              @foreach ($product as $item)
              <b>รหัสสินค้า</b> : <input class="m-2" type="number" name="product_id"  value="{{$item->id}}" style="border:none;background-color:transparent;"readonly><br>
              <b>ชื่อสินค้า</b> : {{$item->product_name}}<br>
              <b>ราคา</b> : {{$item->price}}<br>
              <b>มีสินค้าทั้งหมด</b> : {{$prodcount}} ชิ้น <br>
             
              @endforeach
              <input type="text" name="input_code" class="form-control" placeholder="ใส่โค๊ดสินค้า" required>

            <br>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">เพิ่มสินค้า</button>        

          </div>
          <br>
        </form>
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">{{ __('All codes') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">รหัส</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">Code</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                         <tr>
                        @foreach ($codes as $code)
                          <td>{{$code->id}}</td>
                          <td>{{$code->product_detail->product_name}}</td>
                          <td>{{$code->product_detail->price}}</td>
                          <td>{{$code->code}}</td>
                          @if ($code->user_id!=null)
                            <td>ขายแล้ว(เจ้าของ : {{$code->user->name}})</td>
                          @else
                          <td>ยังไม่ขาย</td>
                          @endif
                          <td><a href="/admin/code/delProd/{{$code->id}}" style="color: red">ลบ</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                
                
                </div>
            </div>
            
        </div>
    </div>
      
  </div>
    
</div>
@endsection