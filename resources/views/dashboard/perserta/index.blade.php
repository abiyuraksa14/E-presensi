@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>TABEL Perserta</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Perserta</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TABEL Perserta</h5>
              <a href="data-perserta/create" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> TAMBAH DATA</a>
              &nbsp; &nbsp;
              <a href="/data-perserta/import" class="btn btn-success"><i class="bi bi-person-plus-fill"></i> TAMBAH DATA BY EXCEL</a>
              <br><br>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">

                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">KODE MATAKULIAH</th></th>
                    <th scope="col">NAMA</th>
                    <th scope="col">NIM</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($dataPerserta as $perserta)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$perserta->matakuliah->kd_matkul}}</td>
                        <td>{{$perserta->user->name}}</td>
                        <td>{{$perserta->user->username}}</td>
                        <td>
                            <a href="data-perserta/edit/{{$perserta->id}}"><i class="bi bi-pencil-square"></i></a> &nbsp;
                            <a href="data-perserta/delete/{{$perserta->id}}"><i class="bi bi-eraser-fill"></i></a>
                        </td>
                    </tr>
               @endforeach
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
