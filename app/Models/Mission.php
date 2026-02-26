<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mission extends Model
{
    use HasFactory;

    public function getShortContentAttribute()
    {
        return Str::limit(strip_tags($this->description), 100, '...');
    }
    public function getPlainContentAttribute()
    {
        return strip_tags($this->description);
    }
}
