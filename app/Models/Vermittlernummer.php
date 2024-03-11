<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vermittlernummer extends Model
{
	protected $table = 'vermittlernummer';
	protected $fillable = [
		'user_id',
		'lieferanten_id',
		'vermittlernummer',
];
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function lieferanten(){
    return $this->belongsTo(Lieferanten::class, 'lieferanten_id');
}
}
