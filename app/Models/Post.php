<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /// Mutator
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = \strtolower($value);
    }

    // Accessor
    public function getSlugAttribute(){
        return Str::slug($this->name);
    }
}
