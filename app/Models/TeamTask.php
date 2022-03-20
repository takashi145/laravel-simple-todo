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

    public function getProgressNameAttribute()
    {
        $progress = [
            '1' => '未着手',
            '2' => '着手中',
            '3' => '完了',
        ];
        return $progress[$this->progress];
    }

}
