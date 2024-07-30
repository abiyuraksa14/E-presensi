@extends('layouts.layout_admin')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">TABEL MAHASISWA</h5>

            <!-- General Form Elements -->
            <form action="/data-mahasiswa/update/{{$user->id}}" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" value="{{$user->username}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">EMAIL</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">PASSWORD</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" placeholder="Silahkan input password">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <a href="/data-mahasiswa" class="btn btn-danger">kembali</a>
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
