@extends('layouts/main', ['title' => 'Daftar Nama Karyawan', 'side' => 'Karyawan'])

@section('contents')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Nama Karyawan</h1>
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


    <div class="row">
      <div class="col">
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

        <table class="table table-striped table-hover">
          <thead>
            <tr>
              {{-- <th scope="col">#</th> --}}
              <th scope="col">Nama</th>
              <th scope="col">Club</th>
              <th scope="col">Divisi</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($karyawans as $item)
            <tr>
                  <th>{{ $item->nama_karyawan }}</th>
                  <th>{{ $item->nama_club }}</th>
                  <th>{{ $item->nama_divisi }}</th>
                  <th>{{ $item->nama_jabatan }}</th>
                  <th>
                    <form action="{{ route('karyawan.destroy',['karyawan'=>$item->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Club?')">
                        @method('delete')
                        @csrf
                        <a class="btn btn-danger">
                            Hapus
                        </a>

                        {{-- <a href="#" class="badge bg-black rounded-pill text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Detail</a> --}}

                    </form>

                    <a href="{{ route('karyawan.edit',['karyawan'=>$item->id]) }}" class="btn btn-warning" method="POST">Update</a>
                   </th>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>

  </div><!-- /.container-fluid -->
</section>
<!-- /.content akhir -------------------------------------------------------------------------------------------------------->

@endsection
