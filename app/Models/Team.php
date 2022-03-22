<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'belongs', 'team_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team_tasks()
    {
        return $this->hasMany(TeamTask::class);
    }

    public function invitation_users()
    {
        return $this->belongsToMany(User::class, 'invitations', 'team_id', 'user_id');
    }
}