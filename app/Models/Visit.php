<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Visit extends Model
{
    use HasFactory;
    public function owner()
    {
        return $this->belongsToMany(Owner::class);
    }
    public function animal()
    {
        return $this->belongsToMany(Animal::class);
    }
}







