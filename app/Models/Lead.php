<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_penyewa',
        'alamat',
        'telefon',
        'tujuan',
        'homestay',
        'check_in',
        'check_out',
        'dewasa',
        'kanak',
        'status'
    ];
}
