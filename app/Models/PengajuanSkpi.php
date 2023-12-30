<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSkpi extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_skpi';

    protected $fillable = [
        'mahasiswa_id',
        'program_studi_id',
        'kode',
        'status',
        'created_at',
        'updated_at'
    ];
}
