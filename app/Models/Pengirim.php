<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    use HasFactory;
    protected $fillable = [
        'pengirim'
    ];
    public function surats()
    {
        return $this->hasOne(Surat::class);
    }
}