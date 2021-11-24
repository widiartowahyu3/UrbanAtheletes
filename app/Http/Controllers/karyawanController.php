<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Models\karyawan;
use Illuminate\Support\Facades\Validator;
// use Symfony\Component\HttpFoundation\Response;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::table('jabatans')->get();
        $data = DB::table('karyawans')
            ->join('divisis', 'divisis.id', '=', 'karyawans.divisi')
            ->join('clubs', 'clubs.id', '=', 'karyawans.club')
            ->join('jabatans', 'jabatans.id', '=', 'karyawans.jabatan')
            ->select('karyawans.id', 'karyawans.nama_karyawan', 'clubs.nama_club', 'divisis.nama_divisi', 'jabatans.nama_jabatan')
            ->get();

        // select karyawans.nama_karyawan, clubs.nama_club,divisis.nama_divisi,jabatans.nama_jabatan
        // from karyawans JOIN clubs on karyawans.club = clubs.id
        // JOIN divisis ON karyawans.divisi = divisis.id
        // join jabatans ON karyawans.jabatan = jabatans.id

        return view('karyawans.index', ['karyawans' => $data]);
    }
    public function create()
    {
        // $data1 = DB::table('karyawans')
        //     ->join('divisis', 'divisis.id', '=', 'karyawans.divisi')
        //     ->join('clubs', 'clubs.id', '=', 'karyawans.club')
        //     ->join('jabatans', 'jabatans.id', '=', 'karyawans.jabatan')
        //     ->select(
        //         'clubs.id AS clubId',
        //         'clubs.nama_club AS NamaClub',
        //         'divisis.id AS divisiId',
        //         'divisis.nama_divisi AS NamaDivisi',
        //         'jabatans.id AS jabatanId',
        //         'jabatans.nama_jabatan AS NamaJabatan'
        //     )
        //     ->get();
        $data1 = DB::table('clubs')->get();
        $data2 = DB::table('divisis')->get();
        $data3 = DB::table('jabatans')->get();

        return view('karyawans.create-karyawan', ['karyawans' => $data1, 'karyawans1' => $data2, 'karyawans2' => $data3]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'nama_karyawan' => 'required',
        ]);
        DB::table('karyawans')->insert([
            'nik' => $request->nik,
            'nama_karyawan' => $request->nama_karyawan,
            'club' => $request->club_id,
            'divisi' => $request->divisi_id,
            'jabatan' => $request->jabatan_id,
            'jenis_kelamin' => $request->jenis_kelamin

        ]);

        return redirect('karyawan')->with('status', 'Karyawan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(karyawan $karyawan)
    {
        // $data = DB::table('karyawans')
        //     ->join('divisis', 'divisis.id', '=', 'karyawans.divisi')
        //     ->join('clubs', 'clubs.id', '=', 'karyawans.club')
        //     ->join('jabatans', 'jabatans.id', '=', 'karyawans.jabatan')
        //     ->select('karyawans.id', 'karyawans.nama_karyawan', 'karyawans.nik', 'karyawans.jenis_kelamin', 'clubs.nama_club', 'divisis.nama_divisi', 'jabatans.nama_jabatan')
        //     ->get();
        $data1 = DB::table('clubs')->get();
        $data2 = DB::table('divisis')->get();
        $data3 = DB::table('jabatans')->get();


        return view('karyawans.update-karyawan', ['karyawans' => $data1, 'karyawans1' => $data2, 'karyawans2' => $data3, 'karyawans3' => $karyawan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, karyawan $karyawan)
    {
        $validatedData =  $request->validate([
            'nama_karyawan' => 'required',
            'nik' => 'required',
        ]);
        DB::table('karyawans')->where('id', $request->id)->update([
            'nama_karyawan' => $request->nama_karyawan,
            'nik' => $request->nik,
            'club' => $request->club_id,
            'divisi' => $request->divisi_id,
            'jabatan' => $request->jabatan_id,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
        return redirect('karyawan')->with('status', 'Karyawan Behasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('karyawans')->where('id', $id)->delete();

        return redirect('karyawan')->with('status', 'Suskes Menghapus Club');
    }
}
