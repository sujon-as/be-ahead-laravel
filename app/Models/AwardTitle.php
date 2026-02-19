<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardTitle extends Model
{
    use HasFactory;
    protected $table = 'award_titles';
    protected $fillable = ['description'];
}
