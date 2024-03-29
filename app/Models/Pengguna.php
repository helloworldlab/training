<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';

    protected $guarded = false;

    const CREATED_AT = 'tarikh_direkod';

    const UPDATED_AT = 'tarikh_dikemaskini';
}
