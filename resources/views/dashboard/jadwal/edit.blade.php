@extends('layouts.layout_admin')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">EDIT JADWAL</h5>

                    <!-- General Form Elements -->
                    <form action="/data-jadwal/update/{{$jadwal->id}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">ID JADWAL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id_jadwal" value="{{$jadwal->id_jadwal}}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">MATA KULIAH</label>
                            <div class="col-sm-10">
                                <select name="id_matkul" id="id_matkul" class="form-control">
                                    <option value="{{$jadwal->id_matkul}}">{{$jadwal->matakuliah->nama_matkul}}</option>
                                    @foreach($matakuliah as $matkul)
                                        <option value="{{$matkul->id}}">{{$matkul->nama_matkul}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">RUANGAN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ruangan" value="{{$jadwal->ruangan}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">HARI</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hari" value="{{$jadwal->hari}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">WAKTU</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="waktu" value="{{$jadwal->waktu}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>

    </div>
</section>
@endsection
