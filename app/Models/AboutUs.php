<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $table = 'about_us';
    protected $fillable = [
        'title',
        'description',
        'img',
        'img_short_text'
    ];
    public static function rules($id = null)
    {
        $rules = [
            'title' => 'required|string',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'img_short_text' => 'required|string|max:255',
        ];

        return $rules;
    }
    public static function updateRules()
    {
        $rules = [
            'title' => 'required|string',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'img_short_text' => 'nullable|string|max:255',
        ];

        return $rules;
    }
}
