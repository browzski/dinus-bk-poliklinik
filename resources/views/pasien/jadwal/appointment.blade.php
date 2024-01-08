@extends('templates.main_pasien')
@section('title', 'Poliklinik - Daftar Poli')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h4 class="c-grey-900">Lakukan Appointment</h4>
                <div class="mT-30">
                    <form action="" method="POST">
                        <div class="c-grey-900">
                            <p>
                                Nama Dokter : <b> {{$jadwal->dokter->nama}}</b> <br>
                                Hari :  <b>{{$jadwal->hari}}</b> <br>
                                Jam Mulai :  <b>{{$jadwal->jam_mulai}}</b> <br>
                                Jam Selesai :  <b>{{$jadwal->jam_selesai}}</b>
                            </p>
                        </div>
                        @csrf
                            <label class="form-label">Keluhan</label>
                            <textarea name="keluhan" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="mt-3 btn btn-primary btn-color">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
