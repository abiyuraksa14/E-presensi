@extends('layouts.layout_admin')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">TABEL PESERTA</h5>

            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <!-- General Form Elements -->
            <form action="{{ route('perserta.store') }}" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">KODE MATAKULIAH</label>
                <div class="col-sm-10">
                    <select name="id_matkul" id="id_matkul" class="form-control">
                      @foreach($matkul as $mk)
                          <option value="{{$mk->kd_matkul}}">{{$mk->kd_matkul}} - {{$mk->nama_matkul}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">MASUKAN MAHASISWA</label>
                <div class="col-sm-10">
                    <select name="id_mahasiswa[]" class="form-control select2-button" id="select-state" multiple="multiple">
                      @foreach($mahasiswa as $mhs)
                          <option value="{{$mhs->username}}">{{$mhs->username}} - {{$mhs->name}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-success">SUBMIT</button>
                  <a href="/data-perserta" class="btn btn-danger">CANCEL</a>
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
