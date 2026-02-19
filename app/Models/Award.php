<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;
    protected $table = 'awards';
    protected $fillable = ['title', 'count'];
    public static function rules($id = null)
    {
        $rules = [
            'title' => 'required|string',
            'count' => 'required|string',
        ];

        return $rules;
    }
}
