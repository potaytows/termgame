@extends('layouts.app')
@section('title','Request')

@section('content')

<div class="container"> 
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li> 
          <li class="breadcrumb-item active" aria-current="page">ส่งคำขอเติมเงิน</li>
        </ol>
      </nav>
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
    
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
     
    </div>
  @endif
    <div class="row bg-light p-2 border text-center">
          <form action="/home/savereq" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                รหัสผู้ใช้งาน : <input class="m-2" type="text" name="user_id" value="{{auth()->user()->id}}" readonly><br>
                ชื่อผู้ใช้ : <input class="m-2" type="text" name="user_name"  value="{{auth()->user()->name}}" readonly><br>
                จำนวนเงินที่เติม(ต้องตรงกับในใบเสร็จ) : <input class="m-2" type="text" name="reqamount" value="" placeholder="จำนวนเงิน" required><br>
              <label for="receiptImg" class="m-2" >ใบเสร็จการโอนเงิน : </label>
              <input type="file" class="form-control-file m-2" accept="image/*"name="slip" required>
              <br>
              <button type="submit" class="btn btn-success">Success</button>
            </div>
            <br>
          </form>
          <hr>
        <h3>คำขอการเติมเงินของคุณ</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Rquest ID</th>
              <th scope="col">User ID</th>
              <th scope="col">Transaction ID</th>
              <th scope="col">สถานะ</th>
              <th scope="col">จำนวนเงิน</th>
              <th scope="col">สลิปอ้างอิง</th>
         
            </tr>
          </thead>
          <tbody>
            @foreach($photos as $item)
            <tr>
              <td>{{ $item->id}}</td>
              <td>{{ $item->user_id}}</td>
              @if ($item->transaction_id ==NULL)
              <td>-</td>
              @else
              <td>{{$item->transaction_id}}</td>
              @endif      
              @if ($item->status==0)
              <td style="color:rgb(238, 206, 26);"><b>กำลังรอการยืนยัน</b></td>
              @endif
              @if ($item->status==1)
              <td style="color: rgb(209, 0, 0);"><b>เติมเงินไม่สำเร็จ</b></td>
              @endif
              @if ($item->status==2)
              <td style="color: rgb(0, 182, 0);"><b>การเติมเงินสำเร็จ</b></td>
              @endif
              <td>{{ $item->reqamount}}</td>
              <td><img src="{{asset('uploads/'.$item ->slip_image)}}" alt="Image" width="100rem" class="rounded"></td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>

   
</div>
@endsection
