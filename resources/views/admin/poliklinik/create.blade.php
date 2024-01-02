@extends('templates.main_admin')
@section('title', 'Poliklinik - Buat')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h4 class="c-grey-900">Buat Poliklinik</h4>
                <div class="mT-30">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nama Poliklinik</label>
                            <input type="text" name="nama_poli" class="form-control">
                        </div>
                        <div class="form-group">

                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="mt-3 btn btn-primary btn-color">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
