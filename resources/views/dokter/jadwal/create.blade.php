@extends('templates.main_dokter')
@section('title', 'Jadwal - Buat')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h4 class="c-grey-900">Buat Jadwal</h4>
                <div class="mT-30">
                    <form action="" id="myForm" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Hari</label>
                            <select name="hari" id="hari" class="form-control">
                                <option value="SENIN">SENIN</option>
                                <option value="SELASA">SELASA</option>
                                <option value="RABU">RABU</option>
                                <option value="KAMIS">KAMIS</option>
                                <option value="JUMAT">JUMAT</option>
                                <option value="SABTU">SABTU</option>
                                <option value="MINGGU">MINGGU</option>
                            </select>
                        </div>
                        <div class="form-group mt-1">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" id="jam_mulai" name="jam_mulai" class="form-control">
                        </div>
                        <div class="form-group mt-1">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" id="jam_selesai" name="jam_selesai" class="form-control">
                        </div>
                        <button type="submit" id="submit" class="mt-3 btn btn-primary btn-color">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var hari = document.querySelector("#hari")
        var jamMulai = document.querySelector("#jam_mulai")
        var jamSelesai = document.querySelector("#jam_selesai")
        var myForm = document.querySelector("#myForm")

        myForm.onsubmit = function() {
            onSubmit(event)
        }

        function onSubmit(event) {
            console.log('submitt')
            event.preventDefault();
            fetch("{{ url('dokter/jadwal/create') }}", {
                    method: "POST",
                    body: JSON.stringify({
                        hari: hari.value,
                        jam_mulai: jamMulai.value,
                        jam_selesai: jamSelesai.value
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                .then((response) => response.json())
                .then((json) => {
                    if(json.status == 400){
                        var message = 
                        `
                        ${json.message}

                        Hari : ${json.data.hari}
                        Jam Mulai : ${json.data.jam_mulai} 
                        Jam Selesai : ${json.data.jam_selesai} 
                        `
                        alert(message)
                    }else if(json.status == 200){
                        window.location.href = "{{url('dokter/jadwal')}}"
                    }else if(json.status == 401){
                        alert(json.message)
                    }
                });
        }
    </script>
@endsection
