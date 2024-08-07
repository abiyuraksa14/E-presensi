<!-- resources/views/dashboard/jadwal/qrcode.blade.php -->

@extends('layouts.layout_admin')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="pagetitle">
      <h1>QR Code Jadwal</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">QR Code</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<center>
    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Silahkan Scan Untuk Absen Masuk <br> Mata kuliah : {{$jadwal->matakuliah->nama_matkul}}  </h5>
              <div>{!! $qrcode !!}</div>
              <br>

            </div>
          </div>
        </div>
      </div>
    </section>
</center>
<a href="{{ URL::previous() }}" class="btn btn-primary">kembali</a>

@endsection
