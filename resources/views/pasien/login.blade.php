@extends('templates.auth')
@section('title','Login Pasien')
@section('content')
<div class="peers ai-s fxw-nw h-100vh">
    <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style='background-image: url("{{url("assets/static/images/bg.jpg")}}")'>
      <div class="pos-a centerXY">
        <div class="bgc-white bdrs-50p pos-r" style="width: 120px; height: 120px;">
          <img class="pos-a centerXY" src="{{url("assets/static/images/logo.png")}}" alt="">
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width: 320px;">
      <h4 class="fw-300 c-grey-900 mB-40">Login Pasien</h4>
      <form action="" method="POST">
        @csrf
        <div class="mb-3">
          <label class="text-normal text-dark form-label">Nama</label>
          <input type="text" class="form-control" name="nama" placeholder="Nama ">
        </div>
        <div class="mb-3">
          <label class="text-normal text-dark form-label">Nomor Handphone</label>
          <input type="text" class="form-control" name="no_hp" placeholder="Handphone">
        </div>
        <div class="">
          <div class="peers ai-c jc-sb fxw-nw">
            <div class="peer">
              <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                <a href="{{url('pasien/register')}}" >Register</a>
              </div>
            </div>
            <div class="peer">
              <button class="btn btn-primary btn-color">Login</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endsection