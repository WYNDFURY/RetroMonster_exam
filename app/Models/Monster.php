<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(MonsterType::class);
    }

    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'rarities');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function notations()
    {
        return $this->hasMany(Notation::class);
    }
}

