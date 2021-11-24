<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clubs;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnValue;

class clubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->club = new clubs();
    // }
    public function index()
    {
        $data = DB::table('clubs')->get();
        return view('clubs.index', ['clubs' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clubs.create-club');
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
            'nama_club' => 'required|min:5',
            'alamat_club' => 'required'
        ]);
        DB::table('clubs')->insert([
            'nama_club' => $request->nama_club,
            'alamat' => $request->alamat_club,

        ]);

        return redirect('club')->with('status', 'Club Berhasil ditambahkan');
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
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('clubs')->where('id', $id)->delete();

        return redirect('club')->with('status', 'Suskes Menghapus Club');
    }
}
