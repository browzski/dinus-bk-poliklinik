@extends('templates.main_pasien')
@section('title', 'Daftar Poliklinik - Index')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="peers ai-c jc-sb gap-40 mB-5">
                    <div class="peer peer-greed">
                        <h4>Data Poliklinik <b>{{$poliklinik->nama_poli}}</b></h4>
                    </div>
                    <div class="peer mR-0">
                        <div class="text-end">
                        </div>
                    </div>
                </div>
                <table class="table  table-hover">
                    <thead class="table-dark  ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                       @foreach($jadwal_list as $jadwal)
                       <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$jadwal->dokter->nama}}</td>
                        <td>{{$jadwal->hari}}</td>
                        <td>{{$jadwal->jam_mulai}}</td>
                        <td>{{$jadwal->jam_selesai}}</td>
                        <td>
                            <a href="{{url("/pasien/jadwal/{$jadwal->id}/appointment")}}" class="btn cur-p btn-info btn-color">Lakukan Appointment</a>

                        </td>
                       </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{$jadwal_list->links()}}
            </div>
        </div>
    </div>
@endsection
