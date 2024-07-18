@extends('layouts.layout_admin')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">TABEL Jadwal</h5>

            <!-- General Form Elements -->
            <form action="/data-jadwal/update/{{$user->id}}" method="POST">
                @csrf
                 <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">id jadwal</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="id_jadwal" value="{{$user->id_jadwal}}">
                    </div>
                  </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">hari</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="hari" value="{{$user->hari}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">jam mulai</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" name="jam_mulai" value="{{$user->jam_mulai}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">jam akhir</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" name="jam_akhir" value="{{$user->jam_akhir}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">matkul</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_matkul" value="{{$user->id_matkul}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputtext" class="col-sm-2 col-form-label">tahun akademik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tahun_akademik" value="{{$user->tahun_akademik}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputtext" class="col-sm-2 col-form-label">jumlah peserta</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jumlah_peserta" value="{{$user->jumlah_peserta}}">
                </div>
              </div>


              <div class="row mb-3">
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
