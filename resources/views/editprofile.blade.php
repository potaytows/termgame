@extends('layouts.app')

@section('title','Your profile')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/home/profile">โปรไฟล์ของฉัน</a></li>
                <li class="breadcrumb-item active" aria-current="page">แก้ไขโปรไฟล์</li>
            </ol>
        </nav>
        <hr>
        {{-- ***หมายเหตุ บางข้อมูลไม่สามรถเปลี่ยนได้ เช่น อีเมลล์ --}}
        <form action="/con/editpro" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="banner container">
                <div class="profilepic p-0">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' class="newpfpinput" name="newpfp" id="imageUpload" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url('{{asset ('userpfp/'. $user->user_pfp) }}');">
                            </div>
                        </div>
                        

                    </div>
                   <div class="profilechangecon">
                    <button class="edit-button" id="confirmEditbutton" type="submit">ยืนยันการแก้ไขข้อมูล</button>
                   </div>
                
                </div>
                <div class="userdetail">
                    <b>ชื่อ</b> :<input class="newnameinput form-control form-control-sm" id=""name="newname" type="text" placeholder="{{$user->name}}" aria-label=".form-control-sm example"><br>
                    <div class="row mb-3">
                        <label for="" class="col-md-4 col-form-label text-md-end">{{ __('เพศ :') }}</label>
                        <div class="col-md-6 mt-2">
                            <div class="form-check form-check-inline">
                    @if ($user->gender == 'ชาย')
                                <input class="oldgenderinput form-check-input " type="radio" name="newgender" id="inlineRadio1" value="" checked required>
                                <label class="form-check-label" for="inlineRadio1">ชาย</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="newgenderinput form-check-input" type="radio" name="newgender" id="inlineRadio2" value="หญิง" required>
                                <label class="form-check-label" for="inlineRadio2">หญิง</label>
                              </div>
                        </div>      
                    </div>
                    @elseif ($user->gender == 'หญิง')
                                <input class="newgenderinput form-check-input " type="radio" name="newgender" id="inlineRadio1" value="ชาย" required>
                                <label class="form-check-label" for="inlineRadio1">ชาย</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="oldgenderinput form-check-input" type="radio" name="newgender" id="inlineRadio2" value="" checked required>
                                <label class="form-check-label" for="inlineRadio2">หญิง</label>
                              </div>
                        </div>      
                    </div>
                    @endif

                </div>
                <div class="userdetail p-2">
                    {{-- <b>เกิดวันที่</b> : <input type="date"> <br> not updated yet--}} 
                  <b>สมัครสมาชิกเมื่อวันที่</b> : {{$user->created_at}}*<br>
                   <b>อีเมลล์</b> : {{$user->email}}*<br></div>
                {{-- <div class="userstatus">
                   <b>Status</b><br>
                   <div class="form-floating">
                    <textarea class="form-control"  style="height:130px;width:300px;"placeholder="Come on, atleast put something in this" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Status</label>
                  </div>
                </div> NOT UPDATED YET --}}
            </form>
    </div>

@endsection