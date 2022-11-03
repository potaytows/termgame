@extends('layouts.app')
@section('title','Denying Confirm')


@section('content')
<div class="container">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/home">AdminHome</a></li>
      <li class="breadcrumb-item"><a href="/admin/topup">Topup</a></li>  
      <li class="breadcrumb-item active" aria-current="page">ยืนยันคำขอ</li>
    </ol>
  </nav>
  <form action="/admin/topup/deny/con" method="POST">
    @csrf
  <div class="row bg-light p-2 border text-center">
   <h2 style="color:red;">คุณต้องกาปฏิเสธคำขอนี้ใช่หรือไม่</h2>
    <p>รหัสคำขอ : <input type="text" name="req_id" value="{{ $reqs->id}}" style="border:none;background-color:transparent;width:30px;"readonly ></p>
    <p>ผู้ขอ : <input type="text" name="user_id" value="{{ $reqs->user_id}}" style="border:none;background-color:transparent;width:30px;"readonly ></p>
    <p>จำนวน(บาท) : <input type="number" name="req_amount" value="{{ $reqs->reqamount}}" style="border:none;background-color:transparent;width:80px;"readonly></p>
    <p>วันที่ขอ : {{$reqs->created_at}}</p>
    <p>สลิปการโอน : </p>
    <div class="text-center"><img src="{{asset('uploads/'.$reqs ->slip_image)}}" alt="Image" width="200rem"class="rounded"></div>
    <div class="mt-2">
        <a href="/admin/adminTopup" class="btn btn-warning"  role="submit">ยกเลิก</a>
        <button type="submit" class="btn btn-danger">ยืนยันการปฏิเสธ</button>
    </div>
    </form>
    
  </div>
</div>


@endsection