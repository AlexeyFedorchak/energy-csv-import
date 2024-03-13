<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifePrivate extends Model
{
    use HasFactory;

    protected $table = 'tarife_privat';
    protected $fillable = [
        'name',
        'firma',
        'preis',
        'grundpreis',
        'type',
        'prov'

    ];
}
