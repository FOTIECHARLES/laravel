<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo_ambiance extends Model
{
    use HasFactory;

    protected $table = 'photo_ambiance';
    protected $primaryKey = 'id';
}
