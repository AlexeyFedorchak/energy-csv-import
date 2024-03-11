<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunden extends Model
{
    use HasFactory;

    protected $table = 'kundens'; // Specify the table name if it differs from the model name convention

    protected $fillable = [
        'name',
        'kundenid',
        'type',
        'vorname',
        'nachname',
        'anrede',
        'title',
        'email',
        'dob',
        'tel_number',
        'street',
        'house_number',
        'door',
        'location',
        'postcode',

        'diff_street',
        'diff_house_number',
        'diff_stairs',
        'diff_door',
        'diff_location',
        'diff_postcode',

        'status'
    ];

}