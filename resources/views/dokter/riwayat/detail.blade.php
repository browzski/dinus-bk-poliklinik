@extends('templates.main_dokter')
@section('title', 'Detail Periksa')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Detail Pemeriksaan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-black"><b>Detail Pasien</b></h5>
                            <p class="text-black">Nama : {{ $data->pasien->nama }} <b>({{ $data->no_antrian }})</b><br>
                                Jadwal : {{ $data->jadwal->hari }} - {{ $data->jadwal->jam_mulai }} -
                                {{ $data->jadwal->jam_selesai }}<br>
                                Keluhan : {{ $data->keluhan }}
                            </p>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="peers ai-c jc-sb gap-40 mB-1">
                                <h5 class="text-black"><b>Resep Obat</b></h5>
                            </div>
                            <table class="table  table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <td>No.</td>
                                        <td>Nama Obat</td>
                                        <td>Kemasan</td>
                                        <td>Harga</td>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php $i = 1; ?>
                                    @foreach($data->detail as $detail)
                                    <?php $obat = $detail->obat ?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$obat->nama_obat}}</td>
                                        <td>{{$obat->kemasan}}</td>
                                        <td>{{$obat->harga}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <form action="" id="myForm" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label class="form-label">Tanggal Periksa</label>
                                            <input type="datetime" value="{{$data->periksa->tgl_periksa}}" id="tgl_periksa" name="tgl_periksa" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label class="form-label">Biaya Periksa</label>
                                            <input type="number"  id="biaya_periksa" 
                                                name="biaya_periksa"  value="{{$data->periksa->biaya_periksa}}"class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-1">
                                            <label class="form-label">Catatan</label>
                                            <textarea name="catatan"  id="catatan" class="form-control" rows="4">{{$data->periksa->catatan}}</textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" id="data-obat" name="data-obat">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection
