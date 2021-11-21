<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class friendRequest extends Model
{
    use HasFactory;

    protected $table = 'friend_requests';

    protected $fillable = [
        'user_to',
        'user_from',
        'status',
    ];

}
