<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentCause extends Model
{
    use HasFactory;
    protected $table = 'recent_causes';
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
}
