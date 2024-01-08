@extends('templates.main_dokter')
@section('title', 'Periksa - Buat')
@section('content')
    <div class="row">
        <div class="modal fade bd-example-modal-lg" id="modalKu" tabindex="-1" aria-labelledby="modalKuLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalKuLabel">
                            Pilih Obat
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <td>No.</td>
                                    <td>Nama Obat</td>
                                    <td>Kemasan</td>
                                    <td>Harga</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($obat_list as $obat)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $obat->nama_obat }}</td>
                                        <td>{{ $obat->kemasan }}</td>
                                        <td>{{ $obat->harga }}</td>
                                        <td><button class="btn btn-secondary" data-bs-dismiss="modal"
                                                onclick="pilihObat('{{ json_encode($obat) }}')">Pilih Obat</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header">
                    <h4>Pemeriksaan Pasien</h4>
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
                                <div class="peer peer-greed">
                                    <h5 class="text-black"><b>Resep Obat</b></h5>
                                </div>
                                <div class="peer mR-0">
                                    <div class="text-end">
                                        <button type="button" class="btn-primary btn-block btn text-white"
                                            data-bs-toggle="modal" data-bs-target="#modalKu">Pilih Obat</button>
                                    </div>
                                </div>
                            </div>
                            <table class="table  table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <td>No.</td>
                                        <td>Nama Obat</td>
                                        <td>Harga</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody id="table-data">
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
                                            <input type="datetime" id="tgl_periksa" name="tgl_periksa" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label class="form-label">Biaya Periksa</label>
                                            <input type="number" value="0" id="biaya_periksa" readonly name="biaya_periksa" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-1">
                                            <label class="form-label">Catatan</label>
                                            <textarea name="catatan" id="catatan" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" id="data-obat" name="data-obat">
                                </div>
            
                                <button type="submit" id="submit" class="mt-3 btn btn-primary btn-color float-right">Simpan

                                </button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>


    <script>
        var hari = document.querySelector("#table-data")
        var dataObat = document.querySelector("#data-obat")
        var biayaPeriksa = document.querySelector("#biaya_periksa")
        var obat_list = []
        var totalBiaya = 0;
        var i = 1;

        fillTable();

        function pilihObat(data) {
            var res = JSON.parse(data)
            obat_list.push(res)
            fillTable()
            console.log(res)
        }

        function fillTable() {
            hari.innerHTML = ""
            i = 1;
            totalBiaya = 0;
            obat_list.forEach(data => {
                hari.innerHTML += `
                    <tr>
                        <td>${i++}</td>
                        <td>${data.nama_obat}</td>
                        <td>${data.harga}</td>
                        <td><button class="btn btn-danger text-white" onclick="hapus('${i-2}')">Hapus</button></td>
                    </tr>
                `
                totalBiaya = totalBiaya + parseInt(data.harga)
            })
            biayaPeriksa.value = totalBiaya
            dataObat.value = JSON.stringify(obat_list)

        }

        function hapus(id) {
            delete obat_list[id]
            fillTable()
        }

    
    </script>
@endsection
