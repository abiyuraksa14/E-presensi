@extends('layouts.layout_admin')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">TABEL DOSEN</h5>

            <!-- General Form Elements -->
            <form action="{{ route('dosen.store') }}" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">NIDN</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">EMAIL</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">PASSWORD</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">SUBMIT</button>
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
