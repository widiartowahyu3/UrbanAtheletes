@extends('layouts/main', ['title' => 'Daftar Nama karyawan', 'side' => 'karyawan'])

@section('contents')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Nama karyawan</h1>
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
                    <form action="{{ route('karyawan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Nama karyawan</label>
                            <input type="text" class="form-control @error('nama_karyawan') is-invalid
                                @enderror" name="nama_karyawan" id="nama_karyawan">
                            @error('nama_karyawan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label>NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid
                                @enderror" name="nik" id="nik">
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_club">Nama Club</label>
                                <select class="form-select" name="club_id" id="club_id">
                                    @foreach ($karyawans as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_club }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_club">Nama Divisi</label>
                                <select class="form-select" name="divisi_id" id="divisi_id">
                                    @foreach ($karyawans1 as $item1)
                                        <option value="{{ $item1->id }}">{{ $item1->nama_divisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_club">Nama Jabatan</label>
                                <select class="form-select" name="jabatan_id" id="jabatan_id">
                                    @foreach ($karyawans2 as $item2)
                                        <option value="{{ $item2->id }}">{{ $item2->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_club">Jenis Kelamin</label>
                                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="Laki-Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
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
