<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'monster_id',
        'notation',
    ];

    protected $primaryKey = 'monster_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function monster()
    {
        return $this->belongsTo(Monster::class);
    }
}
