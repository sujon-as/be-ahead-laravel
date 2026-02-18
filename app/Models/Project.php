<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['image', 'description'];
    public static function rules($id = null)
    {
        $rules = [
            'description'    => 'required|string',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        return $rules;
    }
    public static function updateRules()
    {
        $rules = [
            'description'    => 'required|string',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        return $rules;
    }
}
