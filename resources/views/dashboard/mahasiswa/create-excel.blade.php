@extends('layouts.layout_admin')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tabel Mahasiswa</h5>

            <!-- General Form Elements -->
            <form action="/data-mahasiswa/import-data" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">File Excel</label><br>
                    <input type="file" class="form-control-file" id="file" name="file" accept=".xlsx, .xls">
                </div><br>
                <button type="submit" class="btn btn-success">Import Data</button>
                <a href="/data-mahasiswa" class="btn btn-danger">Cancel</a>
            </form>

          </div>
        </div>

      </div>

      </div>
    </div>
  </section>
@endsection
