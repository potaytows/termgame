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
        <div class="container text-center">
            <div class="row">
                @foreach ($games as $game)
                    
                
                <div class="col-md-6 mt-5 p-0">
                    <div class="card" style="width:20rem; height:40rem;">
                    <img src="{{asset('game_thumb/'.$game->game_thmb)}}" class="gameimg card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{$game->game_name}}</b></h5>
                        <br>
                        <a href="/admin/addCode/{{$game->id}}" class="btn btn-primary">เพิ่มสินค้าให้ {{$game->game_name}}</a><br>
                        <a href="/admin/delGame/{{$game->id}}" class="btn btn-danger m-4">ลบ {{$game->game_name}}</a>


                    </div>
                    </div>
                </div>
               
                @endforeach
              
            </div>
            
            <div class="mt-5">
                <a href="/admin/addGame" class="btn btn-primary">เพิ่มเกม</a>
            </div>
            
    
        </div>

    </div>
</div>
@endsection



