@extends('templates.main_admin')
@section('title', 'Obat - Index')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="peers ai-c jc-sb gap-40 mB-5">
                    <div class="peer peer-greed">
                        <h4>Data Obat</h4>
                    </div>
                    <div class="peer mR-0">
                        <div class="text-end">
                            <a href="{{url('/admin/obat/create')}}" class="btn cur-p btn-primary btn-color">Tambah Obat</a>
                        </div>
                    </div>
                </div>
                <table class="table  table-hover">
                    <thead class="table-dark  ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Kemasan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                       @foreach($obat_list as $obat)
                       <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$obat->nama_obat}}</td>
                        <td>{{$obat->kemasan}}</td>
                        <td>{{$obat->harga}}</td>
                        <td>
                            <a href="{{url("/admin/obat/{$obat->id}/edit")}}" class="btn cur-p btn-info btn-color">Edit</a>
                            <a href="{{url("/admin/obat/{$obat->id}/delete")}}" class="btn cur-p btn-danger btn-color">Delete</a>

                        </td>
                       </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{$obat_list->links()}}
            </div>
        </div>
    </div>
@endsection
