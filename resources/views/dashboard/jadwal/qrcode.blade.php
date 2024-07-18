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

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">QR Code Jadwal</h5>
              <div>{!! $qrcode !!}</div>
              <br>
             <button> <a href="data-jadwal.index">Kembali</a> </button>

            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
