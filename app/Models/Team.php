<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams'; // Specify the table name if it differs from the model name convention

    protected $fillable = [
        'name',
        'teamid',
        'percentage',
        'is_active'
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'teamid');
    }
}