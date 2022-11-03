@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="container ">
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
    
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ยินดีต้อนรับ') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        ยินดีต้อนรับเข้าสู่เว็ป Termgame!
                        Powered by Takachi Yakinuma

                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="container text-center">
    <div class="row">
        @foreach ($games as $game)
            
        <div class="col-md-6 mt-5 p-0">
            <div class="card" style="width:20rem; height:40rem;">
            <img src="{{asset('game_thumb/'.$game->game_thmb)}}" class="gameimg card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><b>{{$game->game_name}}</b></h5>
                <p class="card-text">{{$game->detail}}</p>
                <a href="game/{{$game->id}}" class="btn btn-primary">เติมเลย</a>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
