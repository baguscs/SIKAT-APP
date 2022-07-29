<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota_Keluarga extends Model
{
    use HasFactory;

    protected $table = "anggota_keluargas";
    protected $fillable = [
        'wargas_id',
        'nik', 
        'nama_warga', 
        'tanggal_lahir', 
        'tempat_lahir', 
        'status_perkawinan', 
        'no_telp', 
        'agama', 
        'jenis_kelamin', 
        'pekerjaan', 
    ];

    protected $guarded = ['id'];
}
