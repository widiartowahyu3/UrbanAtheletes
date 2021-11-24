@extends('layouts/main', ['title' => 'Daftar Nama Divisi', 'side' => 'Divisi'])

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

    {{-- @dump($divisis) --}}

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-sm-5">
        <!-- Button trigger modal -->

        <a href="{{ route('divisi.create') }}" class="btn btn-primary mb-3">Tambah Divisi</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- <th>#</th> --}}
                    <th>Nama Divisi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        @foreach ($divisis as $item)
                            <tr>
                                {{-- <th>{{ $key }}</th> --}}
                                <th>{{ $item-> nama_divisi}}</th>
                                <th>
                                    <form action="{{ route('divisi.destroy',['divisi'=>$item->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Club?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        {{-- <a href="#" class="badge bg-black rounded-pill text-decoration-none" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">Detail</a> --}}

                                    </form>
                                </th>
                            </tr>
                            {{-- {{ $key++ }} --}}
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Divisi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="mb-2">
            <label for="nama_divisi" class="form-label">Nama Divisi</label>
            <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror" id="nama_divisi"
              name="nama_divisi" value="{{ old('nama_divisi') }}" placeholder="Nama Divisi" required>
            @error('nama_divisi')
            <div id="nama_divisi" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
