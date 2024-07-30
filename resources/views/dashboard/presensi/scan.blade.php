@extends('layouts.layout_admin')

@section('content')


    <div class="pagetitle">
        <h1>Scan QR Code</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Scan QR Code</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <center>
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
        <br><br>
        <div id="qr-reader" style="width:50%;"></div></center>
    <div id="qr-reader-results"></div>

    {{-- <div class="row">
        <div class="col-md-6">
            <a href="/">Izin</a>
            <a href="/">Sakit</a>
        </div>
    </div> --}}

@endsection
