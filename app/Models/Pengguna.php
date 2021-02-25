<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    // Digunakan untuk mewakili nama table apa
    protected $table = 'pengguna';
    // Nama lain kolum created at;
    const CREATED_AT = 'tarikh_rekod';
    // Nama lain kolum updated_at
    const UPDATED_AT = 'tarikh_kemaskini';
}
