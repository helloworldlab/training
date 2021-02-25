<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agensi extends Model
{
    use HasFactory;

    // Digunakan untuk mewakili nama table apa
    protected $table = 'agensi';
    // Disabled kolum created_at dan updated_at
    public $timestamps = false;
}
