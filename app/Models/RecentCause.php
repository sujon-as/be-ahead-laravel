<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RecentCause extends Model
{
    use HasFactory;
    protected $table = 'recent_causes';
    protected $fillable = ['percentage', 'content', 'img', 'status'];
    public static function rules($id = null)
    {
        $rules = [
            'img'    => 'required|image|mimes:jpg,jpeg,png,webp',
            'percentage'    => 'required|string',
            'content'    => 'required|string',
            'status' => 'nullable|in:Active,Inactive',
        ];

        return $rules;
    }
    public static function updateRules()
    {
        $rules = [
            'img'    => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'percentage'    => 'required|string',
            'content'    => 'required|string',
            'status' => 'nullable|in:Active,Inactive',
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
