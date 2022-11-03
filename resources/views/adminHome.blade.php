@extends('layouts.app')
@section('title','AdminHome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    You are admin
                    

                
                </div>
            </div>
            
        </div>
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">{{ __('All users') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Role</th>
                            <th scope="col">Registered date</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                         <tr>
                        @foreach ($users as $user)
                          <td>{{$user->id}}</td>
                          <td><img src="{{asset('userpfp/'.$user->user_pfp)}}" class="iconprofileimg" alt="user_pfp">{{$user->name}}</td>
                          <td>{{$user->balance}}</td>
                          @if($user->is_admin==0)
                          <td>Normal User</td>
                          @else
                          <td>Admin</td>
                          @endif
                          <td>{{$user->created_at}}</td>
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



