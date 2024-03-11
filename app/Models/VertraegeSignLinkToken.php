<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VertraegeSignLinkToken extends Model
{
    use HasFactory;

    protected $table = 'vertraege_sign_link_tokens';

    protected $fillable = [
      'vertraege_id',
      'token',
      'expires_at'
    ];
}
