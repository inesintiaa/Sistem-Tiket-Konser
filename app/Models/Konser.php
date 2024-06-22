<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konser extends Model
{
    use HasFactory;
    protected $table = 'konser';
    protected $fillable = [
        'name',
        'description',
        'date',
    ];
    protected $dates = [
        'date',
    ];
}
