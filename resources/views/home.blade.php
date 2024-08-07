@extends('layouts.layout_admin')

@section('content')


<div class="pagetitle">
    <h1> Hai, {{Auth()->user()->name}} <img src="{{asset('template/assets/img/hello.png')}}" alt="Waving Hand" style="width: 30px; height: 30px;"></h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-15">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">mahasiswa</h5>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$mhs}}</h6>
                                    <p>Jumlah Mahasiswa</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Dosen </h5>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                     <h6>{{$dsn}}</h6>
                                    <p>Jumlah Dosen</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->


      </div>
    </div>
  </div>

        </div>
    </div>
</div>

    </div>
</section>

@endsection
