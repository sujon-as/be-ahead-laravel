<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cause extends Model
{
    use HasFactory;
    protected $table = 'causes';
    protected $fillable = ['percentage', 'content', 'img'];
    public static function rules($id = null)
    {
        $rules = [
            'img'    => 'required|image|mimes:jpg,jpeg,png,webp',
            'percentage'    => 'required|string',
            'content'    => 'required|string',
        ];

        return $rules;
    }
    public static function updateRules()
    {
        $rules = [
            'img'    => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'percentage'    => 'required|string',
            'content'    => 'required|string',
        ];

        return $rules;
    }
    public function getShortContentAttribute()
    {
        return Str::limit(strip_tags($this->content), 100, '...');
    }
    public function getPlainContentAttribute()
    {
        return strip_tags($this->content);
    }
}
