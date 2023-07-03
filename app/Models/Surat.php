<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'isi',
        'kategori_id',
        'penerima_id',
        'pengirim_id'
    ];
    public function kategoris()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function penerimas()
    {
        return $this->belongsTo(Penerima::class, 'penerima_id');
    }
    public function pengirims()
    {
        return $this->belongsTo(Pengirim::class, 'pengirim_id');
    }
    protected $table = 'surats';
    public $timestamp = 'false';
}