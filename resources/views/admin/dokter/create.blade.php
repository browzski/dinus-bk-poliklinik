@extends('templates.main_admin')
@section('title', 'Obat - Buat')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h4 class="c-grey-900">Buat Dokter</h4>
                <div class="mT-30">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Poliklinik</label>
                            <select name="id_poli" class="form-control" >
                                <option value="" selected disabled>-- Pilih Poliklinik --</option>
                                @foreach($poliklinik_list as $poliklinik)
                                <option value="{{$poliklinik->id}}">{{$poliklinik->nama_poli}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">

                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">No HP</label>
                            <input type="number" name="no_hp" class="form-control">
                        </div>
                        
                        <button type="submit" class="mt-3 btn btn-primary btn-color">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
