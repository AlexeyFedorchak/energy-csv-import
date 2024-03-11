<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieferanten extends Model
{
	protected $table = 'lieferanten';
	protected $fillable = [
		'name',
];
}
