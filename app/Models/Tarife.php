<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarife extends Model
{
  use HasFactory;

  protected $table = 'tarife'; // Specify the table name if it differs from the model name convention

  protected $fillable = [
    'tarife',
    'firma',
    'preis',
    'grundpreis',
    'type',
    'prov',
    'contract_type',
    'status',
    'pdf_path',
    'original_file_name',
    'fields',
    'lieferanten_id'
  ];
public function lieferanten(){
    return $this->belongsTo(Lieferanten::class, 'lieferanten_id');
}
}
