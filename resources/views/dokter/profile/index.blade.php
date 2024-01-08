@extends('templates.main_dokter')
@section('title', 'Profile')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h4 class="c-grey-900">Detail Profile</h4>
                <div class="mT-30">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nama Dokter</label>
                            <input type="text" value="{{$profile->nama}}" name="nama" class="form-control">
                        </div>
                     
                        <div class="form-group">
                            <label class="form-label">Nomor HP</label>
                            <input type="number" name="no_hp" value="{{$profile->no_hp}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Poliklinik</label>
                            <select name="id_poli" class="form-control" >
                                @foreach($poliklinik_list as $poliklinik)
                                <option {{($profile->id_poli == $poliklinik->id ?"selected" :"")}} value="{{$poliklinik->id}}">{{$poliklinik->nama_poli}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" >{{$profile->alamat}}</textarea>
                        </div>
                 

                        <button type="submit" class="mt-3 btn btn-primary btn-color">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
