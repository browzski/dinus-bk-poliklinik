@extends('templates.main_dokter')
@section('title','Pendaftar Poliklinik')
@section('content')
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="peers ai-c jc-sb gap-40 mB-5">
                <div class="peer peer-greed">
                    <h4>Data Pendaftar Poliklinik</h4>
                </div>
                <div class="peer mR-0">
                    <div class="text-end">
                        <a href="{{url('/dokter/daftar/create')}}" class="btn cur-p btn-primary btn-color">Tambah Pendaftar Poliklinik</a>
                    </div>
                </div>
            </div>
            <table class="table  table-hover">
                <thead class="table-dark  ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam Mulai</th>
                        <th scope="col">Jam Selesai</th>
                        <th scope="col">Antrian</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                   @foreach($daftar_list as $daftar)
                   <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{@$daftar->pasien->nama}}</td>
                    <td>{{$daftar->jadwal->hari}}</td>
                    <td>{{$daftar->jadwal->jam_mulai}}</td>
                    <td>{{$daftar->jadwal->jam_selesai}}</td>
                    <td>{{$daftar->no_antrian}}</td>
                    <td>
                        <a href="{{url("/dokter/periksa/{$daftar->id}")}}" class="btn cur-p btn-primary btn-color">Periksa Pasien</a>
                    </td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {{$daftar_list->links()}}
        </div>
    </div>
</div>
@endsection
