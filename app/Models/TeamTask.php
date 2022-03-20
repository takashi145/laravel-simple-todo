<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'user_id',
        'name',
        'explanation',
        'deadline',
        'progress',
    ];

    public function team()
    {
        return $this->hasOne(Team::class);
    }

}
