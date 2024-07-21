@extends('layouts.layout_admin')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">TABEL perserta</h5>

            <!-- General Form Elements -->
            <form action="/data-perserta/update/{{$user->id}}" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">KODE MATAKULIAH</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kd_matkul" value="{{$user->id_matkul}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nim" value="{{$user->id_mahasiswa}}">
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
