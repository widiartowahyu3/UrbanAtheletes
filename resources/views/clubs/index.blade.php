@extends('layouts/main', ['title' => 'Daftar Nama Club', 'side' => 'Club'])

@section('contents')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Nama Club</h1>
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
        <a href="{{ route('club.create') }}" class="btn btn-primary mb-3">Tambah Club</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        Nama Club
                    </th>
                    <th>
                        Alamat Club
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        @foreach ($clubs as $item)
                            <tr>
                                <th>{{ $item-> nama_club}}</th>
                                <th>{{ $item-> alamat}}</th>
                                <th>
                                    <form action="{{ route('club.destroy',['club'=>$item->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Club?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <a href="#" class="badge bg-black rounded-pill text-decoration-none" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">Detail</a>

                                    </form></th>
                            </tr>
                        @endforeach
                    </th>
                </tr>
            </tbody>
        </table>
      </div>
    </div>

  </div><!-- /.container-fluid -->
</section>
<!-- /.content akhir -------------------------------------------------------------------------------------------------------->


@endsection
