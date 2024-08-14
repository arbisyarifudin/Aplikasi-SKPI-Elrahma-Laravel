<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public $table = 'mahasiswa';

    protected $fillable = [
        'user_id',
        'user_siakad_id',
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
    ];

    protected $appends = [
        'tanggal_lahir_indo',
        'nomor_whatsapp',
    ];

    /* ATTRIBUTES */
    public function getTanggalLahirIndoAttribute()
    {
        return date('d-M-Y', strtotime($this->tanggal_lahir));
    }

    public function getNomorWhatsappAttribute()
    {
        return preg_replace('/^0/', '62', $this->no_telepon);
    }

    /* RELATIONS */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prestasis () {
        return $this->hasMany(Prestasi::class);
    }

    public function programStudis () {
        return $this->hasMany(MahasiswaProgramStudi::class, 'mahasiswa_id');
    }

}
