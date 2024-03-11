<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups'; // Specify the table name if it differs from the model name convention

    protected $fillable = [
        'name',
        'api_key'
    
    ];
	/*public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_tariffs', 'group_id', 'tariff_id');
    }*/
}