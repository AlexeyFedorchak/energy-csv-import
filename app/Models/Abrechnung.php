<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abrechnung extends Model
{
    use HasFactory;

    protected $table = 'abrechnungen';
    protected $fillable = [
        'zaehlpunktnummer',
        'kwh',
        'commission'
    ];
}
