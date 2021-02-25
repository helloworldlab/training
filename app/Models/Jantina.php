<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jantina extends Model
{
    use HasFactory;

    // Digunakan untuk mewakili nama table apa
    protected $table = 'jantina';
    // Disabled kolum created_at dan updated_at
    public $timestamps = false;
}
