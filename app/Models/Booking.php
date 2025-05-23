<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tujuan',
        'nama_penyewa',
        'alamat',
        'check_in',
        'check_out',
        'dewasa',
        'kanak',
        'homestay',
    ];
}
