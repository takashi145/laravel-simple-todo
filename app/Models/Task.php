<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'explanation',
        'deadline',
        'progress',
    ];
    
    public function user()
    {
        return $this->hasOne(User::class);
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
