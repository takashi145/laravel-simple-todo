<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function belongs()
    {
        return $this->belongsToMany(User::class, 'belongs', 'team_id', 'user_id');
    }
}