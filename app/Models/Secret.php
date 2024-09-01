<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    use HasFactory;

    protected $fillable = [
        'secret',  // The secret content
        'user_id',  // The ID of the user who created the secret
    ];
}
