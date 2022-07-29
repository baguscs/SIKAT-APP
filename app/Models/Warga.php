<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = "wargas";
    protected $fillable = [
        'nik', 
        'nama_warga', 
        'tanggal_lahir', 
        'tempat_lahir', 
        'status_perkawinan', 
        'no_kk', 
        'alamat',
        'no_telp', 
        'agama', 
        'jenis_kelamin', 
        'pekerjaan', 
        'akun'
    ];

    protected $guarded = ['id'];

    /**
     * Get the user associated with the Warga
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
