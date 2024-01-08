@extends('templates.main_dokter')
@section('title','Dashboard')
@section('content')
<div class="row gap-20 masonry pos-r">
   <div class="masonry-sizer col-md-6"></div>
      <div class="masonry-item col-md-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Daftar Antrian</h4>
            </div>
            <div class="card-body">
               <table class="table  table-hover">
                  <thead class="table-dark">
                     <tr>
                        <td>Nomor</td>
                        <td>Nama Poliklinik</td>
                        <td>Nama Dokter</td>
                        <td>Hari</td>
                        <td>Jam Masuk</td>
                        <td>Jam Selesai</td>
                        <td>Antrian</td>
                        <td>Status</td>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i=1; ?>
                     @foreach($antrian_list as $antrian)
                     <tr>
                        <td>{{$i++}}</td>
                        <td>{{$antrian->jadwal->dokter->poliklinik->nama_poli}}</td>
                        <td>{{$antrian->jadwal->dokter->nama}}</td>
                        <td>{{$antrian->jadwal->hari}}</td>
                        <td>{{$antrian->jadwal->jam_mulai}}</td>
                        <td>{{$antrian->jadwal->jam_selesai}}</td>
                        <td>{{$antrian->no_antrian}}</td>
                        <td>
                           <a href="{{url('dokter/riwayat/detail/'.$antrian->id)}}" class="btn btn-success text-white">Selesai</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection
