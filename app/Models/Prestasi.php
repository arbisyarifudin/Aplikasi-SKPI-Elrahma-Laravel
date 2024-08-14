<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    public $table = 'prestasi';

    protected $appends = [
        'file_sertifikat_url',
    ];

    /* ATTRIBUTES */
    public function getFileSertifikatUrlAttribute()
    {
        return $this->file_sertifikat ? \App\Utils\Skpi::getAssetUrl($this->file_sertifikat) : '';
    }
}
