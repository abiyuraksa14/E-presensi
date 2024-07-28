@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>TABEL DOSEN</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tabel</li>
          <li class="breadcrumb-item active">Dosen</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TABEL DOSEN</h5>
              <a href="data-dosen/create" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> TAMBAH DATA</a>
              <br><br>

              <!-- Table with hoverable rows -->
              <table class="table table-hover" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($dataDsn as $dsn)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$dsn->username}}</td>
                        <td>{{$dsn->name}}</td>
                        <td>{{$dsn->email}}</td>
                        <td>
                            <a href="data-dosen/edit/{{$dsn->id}}"><i class="bi bi-pencil-square"></i></a> &nbsp;
                            <a href="data-dosen/delete/{{$dsn->id}}"><i class="bi bi-eraser-fill"></i></a>
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
