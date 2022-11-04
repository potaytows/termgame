@extends('layouts.app')
@section('title','Search')

@section('content')

<div class="container"> 
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li> 
            <li class="breadcrumb-item active" aria-current="page">Searching</li>
        </ol>
      </nav>
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
    
    @endif
   <div class="container">
    <div class="res">
    @foreach ($res as $user)
    <div class="eachres">
            <img src="{{asset('userpfp/'.$user->user_pfp)}}" class="pfpofres" alt="user_pfp">
            <div class="rescon">
                {{$user->name}}
                <a href="/profile/" class="linktopro btn btn-success" role="button">ดูโปรไฟล์</a>
            </div>        
    </div>
        
    @endforeach
    </div>

   </div>
@endsection