<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','surface', 'rooms', 'bedrooms', 'floor', 'city', 'postal_code', 'price', 'address', 'sold'];

    public function options(){
        return $this->BelongsToMany(Option::class);
    }
}
