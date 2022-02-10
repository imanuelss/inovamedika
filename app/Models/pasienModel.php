<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasienModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_pasien', 'nama_pasien', 'alamat','diagnosa','tindakan'
    ];
}
