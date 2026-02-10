<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $table = 'features';
    protected $fillable = [
        'title_1',
        'title_2',
        'bg_img',
        'status',
    ];
    public static function rules($id = null)
    {
        $rules = [
            'title_1'    => 'required|string|max:255',
            'title_2'    => 'required|string|max:255',
            'bg_img'     => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'status'     => 'required|in:Active,Inactive',
        ];

        return $rules;
    }
    public static function featureStausUpdateRules()
    {
        $rules = [
            'id' => 'required|string|exists:features,id',
            'status' => 'required|in:Active,Inactive',
        ];

        return $rules;
    }
}
