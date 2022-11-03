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
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Add Game') }}</div>

                <div class="card-body">
                    <form action="/admin/saveGameAdd" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            ชื่อเกม : <input class="m-2" type="text" name="game_name"><br>
                            Detail : <input class="m-2" type="text" name="game_detail" ><br>
                          <label for="receiptImg" class="m-2" >รูปเกม : </label>
                          <input type="file" class="form-control-file m-2" name="game_img" required>
                          <br>
                          <button type="submit" class="btn btn-primary">เพิ่ม</button>
                        </div>
                        <br>
                        
                      </form>
                   
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">รหัสเกม</th>
                                <th scope="col">ชื่อเกม</th>
                                <th scope="col">Details</th>  
                                <th scope="col">รูป</th>
                                <th scope="col"></th>

                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($games as $game)
                            
                              <tr>
                              <td>{{$game->id}}</td>
                              <td>{{$game->game_name}}</td>
                              <td>{{$game->detail}}</td>
                              <td><a href="{{asset('game_thumb/'.$game->game_thmb)}}" target="/_blank">ดูรูป</a></td>
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