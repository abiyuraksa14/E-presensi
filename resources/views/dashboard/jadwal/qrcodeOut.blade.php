<!-- resources/views/dashboard/jadwal/qrcode.blade.php -->

@extends('layouts.layout_admin')

@section('content')
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
              <h5 class="card-title"> Hai,  {{Auth()->user()->name}} <br><br> Silahkan Scan Untuk Absen Keluar <br> Mata kuliah : {{$jadwal->matakuliah->nama_matkul}}  </h5>
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
