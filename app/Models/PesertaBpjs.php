<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesertaBpjs extends Model
{
    // Menentukan nama tabel di database secara manual karena bentuknya singular/tidak berakhiran s
    protected $table = 'peserta_bpjs';

    // Mengizinkan semua kolom untuk diisi (mass assignment) kecuali id
    protected $guarded = ['id'];

    // Relasi: Peserta BPJS milik satu User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi: Satu peserta bisa memiliki banyak tagihan
    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'peserta_id');
    }
}