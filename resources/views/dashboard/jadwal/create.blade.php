@extends('layouts.layout_admin')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">General Form Elements</h5>

            <!-- General Form Elements -->
            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Id jadwal</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_jadwal">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">hari</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="hari">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">jam_mulai</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jam_akhir">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">id_matkul</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_matkul">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">tahun akademik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tahun_akademik">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">jumlah peserta</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jumlah_peserta">
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
