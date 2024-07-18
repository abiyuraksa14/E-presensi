@extends('layouts.layout_admin')

@section('content')
    {{-- <div class="pagetitle">
        <h1>Scan QR Code</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Scan QR Code</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Scan QR Code</h5>
                    <div id="qr-reader" style="width: 500px;"></div>
                    <div id="qr-reader-results"></div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <script>
        function onScanSuccess(qrCodeMessage) {
            console.log(`QR code detected: ${qrCodeMessage}`);
            fetch('{{ route('scan.qr.process') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ jadwal_id: qrCodeMessage })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('qr-reader-results').innerText = 'Jadwal found: ' + JSON.stringify(data.data);
                } else {
                    document.getElementById('qr-reader-results').innerText = 'Error: ' + data.message;
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function onScanFailure(error) {
            console.warn(`QR code scan error: ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script> --}}
    <div class="pagetitle">
        <h1>QR Code Jadwal</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">QR Code Jadwal</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    {{-- <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">QR Code Jadwal</h5>
                    @if($qrcodes->isEmpty())
                        <p>No QR codes available.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jadwal ID</th>
                                    <th>QR Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($qrcodes as $qrcode)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $qrcode->jadwal_id }}</td>
                                        <td><img src="{{ asset($qrcode->file_path) }}" alt="QR Code" style="max-width: 150px;"></td>
                                        <td>
                                            <a href="{{ route('data-jadwal.index') }}" class="btn btn-primary">Kembali</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
@endsection --}}
