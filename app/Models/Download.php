<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = ['heading', 'explanation', 'file_path'];
    
    public function getFilePathsAttribute($value)
{
    return json_decode($value, true);
}

public function setFilePathsAttribute($value)
{
    $this->attributes['file_paths'] = json_encode($value);
}

}
