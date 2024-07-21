@extends('layouts.layout_admin')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tabel Jadwal</h5>

            <!-- General Form Elements -->
            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf
              <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">hari</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="hari">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">tanggal</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tanggal">
                </div>
              </div>
                <div class="mb-3 row">
                    <label for="jam_mulai" class="col-sm-2 col-form-label">jam_mulai</label>
                    <div class="col-sm-10">
                    <input type="time" class="form-control" name="jam_mulai">
                    </div>
              </div>
              <div class="mb-3 row">
                <label for="jam_akhir" class="col-sm-2 col-form-label">jam_akhir</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" name="jam_akhir">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">id_matkul</label>
                <div class="col-sm-10">
                  <select name="id_matkul" id="id_matkul" class="form-control">
                    @foreach($matkul as $mtk)
                        <option value="{{$mtk->kd_matkul}}">{{$mtk->kd_matkul}} - {{$mtk->nama_matkul}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">tahun akademik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tahun_akademik">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">jumlah peserta</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jumlah_peserta">
                </div>
              </div>
              {{-- <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Buat Barcode</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="barcode">
                </div>
              </div> --}}

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>



            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      </div>
    </div>
  </section>
@endsection
