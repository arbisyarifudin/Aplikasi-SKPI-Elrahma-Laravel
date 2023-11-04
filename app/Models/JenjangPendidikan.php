<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenjangPendidikan extends Model
{
    use HasFactory;

    public $table = 'jenjang_pendidikan';

    protected $fillable = [
        'nama',
        'nama_en',
        'singkatan',
        'level_kkni',
        'syarat_masuk',
        'syarat_masuk_en',
        'lama_studi_reguler',
        'jenjang_lanjutan',
        'jenjang_lanjutan_en',
    ];

    /* RELATIONS */
    public function programStudi()
    {
        return $this->hasMany(ProgramStudi::class, 'jenjang_pendidikan_id', 'id');
    }
}
