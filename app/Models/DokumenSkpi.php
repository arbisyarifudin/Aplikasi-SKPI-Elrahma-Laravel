<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenSkpi extends Model
{
    use HasFactory;

    public $table = 'dokumen_skpi';

    protected $fillable = [
        'mahasiswa_id',
        'program_studi_id',
        'nomor',
        'tanggal',
        'file'
    ];
}
