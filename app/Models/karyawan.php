<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $fillable = ['nik', 'nama_karyawan', 'club', 'divisi', 'jabatan', 'jenis_kelamin'];
}
