<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawaiModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip', 'nama_pegawai', 'alamat','posisi_jabatan'
    ];
}
