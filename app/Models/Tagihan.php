<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';
    protected $guarded = ['id'];

    // Relasi ke Peserta BPJS
    public function peserta()
    {
        return $this->belongsTo(PesertaBpjs::class, 'peserta_id');
    }
}