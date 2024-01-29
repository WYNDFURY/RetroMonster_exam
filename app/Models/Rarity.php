<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    use HasFactory;
    protected $table="rarities";
    
    public function monsters()
    {
        return $this->hasMany(Monster::class, 'rarety_id');
    }
}
