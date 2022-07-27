<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;
    protected $table = "aduans";
    protected $fillable = [
        'users_id', 'judul', 'isi', 'bukti', 'status', 'created_at', 'updated_at'
    ];

    protected $guarded = ['id'];

    /**
     * Get the user that owns the Aduan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
