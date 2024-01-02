@extends('templates.auth')
@section('title', 'Landing Page')
@section('content')
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
            style='background-image: url("{{ url('assets/static/images/bg.jpg') }}")'>
            <div class="pos-a centerXY">
                <div class="bgc-white bdrs-50p pos-r" style="width: 120px; height: 120px;">
                    <img class="pos-a centerXY" src="{{ url('assets/static/images/logo.png') }}" alt="">
                    <img class="pos-a centerXY" src="{{ url('assets/static/images/logo.png') }}" alt="">
                    <img class="pos-a centerXY" src="{{ url('assets/static/images/logo.png') }}" alt="">

                </div>

              

            </div>
            <div class="layers bd  p-20">
                <div class="row  ">
                    <div class="col-md-3">
                        <a href="{{ url('/admin/login') }}" class="btn btn-primary">Login Admin</a>
                       
                    </div>
                    <div class="col-md-3">
                        <a href="{{ url('/pasien/login') }}" class="btn btn-danger">Login Pasien</a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ url('/dokter/login') }}" class="btn btn-dark">Login Dokter</a>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
