@extends('layouts.app')
@section('title','AdminCode')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="row bg-light p-2 border text-left">
          <form action="/admin/code/doAddPro" method="post">
            @csrf
            <div class="form-group">
                @foreach ($game as $item)
                <b>รหัสเกม</b> : <input class="m-2" type="number" name="game_id"  value="{{$item->id}}" style="border:none;background-color:transparent;"readonly><br>
                <b>ชื่อเกม</b> : {{$item->game_name}}<br>       
                @endforeach
                <b>ชื่อสินค้า : </b><input type="text" name="product_name" class="form-control" placeholder="ใส่ชื่อสินค้าที่ต้องการเพิ่ม" required>
                <b>ราคา : </b><input type="number" name="product_price" max="1000000"class="form-control" placeholder="ใส่ราคาสินค้า" required>
  
              <br>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">เพิ่มสินค้า</button> 
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">คุณต้องการเพิ่มสินค้านี้หรือไม่?</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                      <button type="submit" class="btn btn-success">เพิ่ม</button>
                      </div>
                  </div>
                  </div>
              </div>           
  
            </div>
            <br>
          </form>
            <div class="card">
                <div class="card-header">{{ __('All Products') }}</div>

                <div class="card-body">
   
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">รหัสสินค้า</th>
                                <th scope="col">ชื่อเกม</th>
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">วันที่ขอ</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($prods as $prod)
                            
                              <tr>
                              <td>{{$prod->id}}</td>
                              <td>{{$prod->game->game_name}}</td>
                              <td>{{$prod->product_name}}</td>
                              <td>{{$prod->price}}</td>
                              <td>{{count($prod->products)}}</td>
                              <td>
                                <a href="<?php echo "/admin/code/add/$prod->id";?>" class="btn btn-info ">เพิ่ม/ดูข้อมูล</a>
                                <a href="<?php echo "/admin/code/doDel/$prod->id";?>" class="btn btn-danger ">ลบ</a>
                              </td>


                              
                              </tr>   
                              @endforeach
                            </tbody>
                          </table>
                    
                </div>
            </div>
            
        </div>
    </div>
    
    
</div>
@endsection



