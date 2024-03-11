<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment'; // Specify the table name if it differs from the model name convention

    protected $fillable = [
        'customer_id',
        'commented_by',
        'comment'
    ];

    public function phone(): HasOne
    {
        return $this->hasOne(User::class);
    }

}