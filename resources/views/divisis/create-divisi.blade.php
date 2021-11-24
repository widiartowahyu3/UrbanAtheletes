@extends('layouts/main', ['title' => 'Daftar Nama Jabatan', 'side' => 'Jabatan'])

@section('contents')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Nama Divisi</h1>
      </div><!-- /.col -->

    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



<!-- Main content  ---------------------------------------------------------------------------------------------------------->
<section class="content">
  <div class="container">

    @if (session('massage'))
    <div id="massage" data-massage="{{ session('massage') }}"></div>
    @endif

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-sm-5">

        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('divisi.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Nama Divisi</label>
                            <input type="text" class="form-control @error('nama_divisi') is-invalid
                                @enderror" name="nama_divisi" id="nama_divisi">
                            @error('nama_divisi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="mb-3 my-3">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>

  </div><!-- /.container-fluid -->
</section>
<!-- /.content akhir -------------------------------------------------------------------------------------------------------->


@endsection
