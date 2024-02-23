<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    public function animal()
    {
        return $this->hasMany(Animal::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($owner) {
            $owner->animal()->delete();
        });
    }
}
