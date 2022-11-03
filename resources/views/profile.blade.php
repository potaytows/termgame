@extends('layouts.app')

@section('title','Your profile')

@section('content')
      <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Home.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">โปรไฟล์ของฉัน</li>
            </ol>
        </nav>
        <hr>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="banner container-fluid">
            <div class="profilepic p-0">
                <div class="avatar-upload">
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url('{{asset ('userpfp/'. $user->user_pfp) }}');">
                        </div>
                    </div>

                </div>
               <div class="profilechange">
                <a href="/home/profile/editprofile">
                <button class="edit-button" type="button">แก้ไขข้อมูล</button>
                </a>
               </div>
            
            </div>
                <div class="userdetail">
                  <b>ไอดียูสเซอร์</b> : {{$user->id}}<br>
                  <b>ชื่อ</b> : {{$user->name}}<br>
                  <b>อีเมลล์</b> : {{$user->email}}<br>
                  <b>ยอดเงินคงเหลือ </b>: {{$user->balance}}<br>
                  <b>เพศ </b>: {{$user->gender}}
                </div>
            </div>
    </div>
</div>
@endsection