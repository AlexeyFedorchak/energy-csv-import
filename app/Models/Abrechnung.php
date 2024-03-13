<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abrechnung extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $table = 'abrechnungen';
    protected $fillable = [
        'contract_id',
        'user_id',
        'kwh',
        'commission',
        'period',
    ];
}
