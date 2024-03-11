<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTeam extends Model
{
    use HasFactory;

    protected $table = 'group_teams'; // Specify the table name if it differs from the model name convention

    protected $fillable = [
        'group_id',
        'team_id',
        
    ];

}