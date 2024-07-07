@extends('layouts.layout_admin')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">General Form Elements</h5>

            <!-- General Form Elements -->
            <form action="{{ route('matkul.store') }}" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Id Matkul</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_matkul">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Matkul</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_matkul">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Kode Matkul</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kd_matkul">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Sks</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="sks">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Ruangan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ruangan">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Durasi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="durasi">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputtext" class="col-sm-2 col-form-label">Dosen Pengampu</label>
                <div class="col-sm-10">
                  <select name="nidn_id" id="nidn_id" class="form-control">
                    @foreach($dosen as $dsn)
                        <option value="{{$dsn->id}}">{{$dsn->username}} - {{$dsn->name}}</option>
                    @endforeach
                  </select>
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
