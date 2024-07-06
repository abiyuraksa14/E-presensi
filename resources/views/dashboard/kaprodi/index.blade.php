@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>Tabel Kaprodi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Kaprodi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table kaprodi</h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($dataMhs as $mhs)
                    <tr>
                        <th scope="row">{{$mhs->id}}</th>
                        <td>{{$mhs->username}}</td>
                        <td>{{$mhs->name}}</td>
                        <td>{{$mhs->email}}</td>
                        <td>
                            <a href="data-mahasiswa/edit/{{$mhs->id}}"><i class="bi bi-pencil-square"></i></a> &nbsp;
                            <a href="data-mahasiswa/delete/{{$mhs->id}}"><i class="bi bi-eraser-fill"></i></a>
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
