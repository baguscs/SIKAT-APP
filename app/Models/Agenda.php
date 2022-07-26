<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = "agendas";
    protected $fillable = [
        'users_id', 'judul', 'isi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai', 'tempat', 'status', 'created_at', 'updated_at'
    ];

    protected $guarded = ['id'];
}
