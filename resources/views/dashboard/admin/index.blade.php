@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>TABEL ADMIN</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tabel</li>
          <li class="breadcrumb-item active">Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">DATA ADMIN</h5>
              <a href="data-admin/create" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> TAMBAH DATA</a>
              <br><br>

              <!-- Table with hoverable rows -->
              <table class="table table-hover" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($dataAdmin as $mhs)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$mhs->username}}</td>
                        <td>{{$mhs->name}}</td>
                        <td>{{$mhs->email}}</td>
                        <td>
                            <a href="data-admin/edit/{{$mhs->id}}"><i class="bi bi-pencil-square"></i></a> &nbsp;
                            <a href="data-admin/delete/{{$mhs->id}}"><i class="bi bi-eraser-fill"></i></a>
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
