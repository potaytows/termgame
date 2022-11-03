@extends('layouts.app')
@section('title','Topup History')


@section('content')
<div class="container">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/home">AdminHome</a></li>
      <li class="breadcrumb-item active" aria-current="page">ประวัติการเติม</li>
    </ol>
  </nav>
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
  <div class="container my-3">
    <div class="topupbox" style="  background-color:#F7FAFF;padding: 20px;border-radius: 10px;">
      <div class="headerTopup" style=" padding-top: 1.25rem;
                                          text-align: center;">
        <h1>ประวัติการเติมเงิน</h1>
        <h5>Transactions</h5>
      </div>
      <div class="text-center row my-3" style="display: flex;
            margin-right: -15px;
            margin-left: -15px;">
        <div class="col-12 col-lg-4 mx-auto my-1">
          <a href="/admin/addCode" class="btn btn-block btn-outline-dark" style="width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-cart-check-fill" viewBox="0 0 16 16">
              <path
                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
            </svg>
            <p>เพิ่มสินค้า</p>
          </a>
        </div>
        <div class="col-12 col-lg-4 mx-auto my-1">
          <a href="/admin/adminTopup" class="btn btn-block btn-outline-dark" style="width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat"
              viewBox="0 0 16 16">
              <path
                d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
            </svg>
            <p>คำขอการเติมเงิน</p>
          </a>
        </div>
        <div class="col-12 col-lg-4 mx-auto my-1">
          <a href="/admin/adminTopupHistory" class="btn btn-block btn-outline-dark" style="width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack"
              viewBox="0 0 16 16">
              <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
              <path
                d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
            </svg>
            <p>ประวัติการเติมเงิน</p>
          </a>
        </div>
      </div>
    </div>
  </div>
  <table class="table bg-white">
    <thead>
      <tr>
        <th scope="col">รหัสการเติม</th>
        <th scope="col">รหัสคำขอการเติมเงิน</th>
        <th scope="col">User ID</th>
        <th scope="col">ชื่อผู้เติม</th>
        <th scope="col">จำนวน</th>
        <th scope="col">วันที่</th>

      </tr>
    </thead>
    <tbody>

      @foreach($reqs as $item)
      <tr>
        <td>{{$item->transaction_id}}</td>
        <td>{{$item->id}}</td>
        <td>{{$item->user_id}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{$item->reqamount}}</td>
        <td>{{$item->transaction->created_at}}</td>
      </tr>


      @endforeach



    </tbody>
  </table>
</div>



@endsection