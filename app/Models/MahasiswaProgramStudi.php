<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaProgramStudi extends Model
{
    use HasFactory;

    public $table = 'mahasiswa_program_studi';

    protected $fillable = [
        'mahasiswa_id',
        'program_studi_id',
        'tahun_masuk',
        'tahun_lulus',
        'nomor_ijazah',
        'gelar',
        'gelar_en',
    ];
}
