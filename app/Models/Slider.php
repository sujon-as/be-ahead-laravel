<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = [
        'title_1',
        'title_2',
        'title_3',
        'bg_img',
        'marker_img',
    ];

    public static function rules($id = null)
    {
        $rules = [
            'title_1'    => 'required|string|max:255',
            'title_2'    => 'required|string|max:255',
            'title_3'    => 'required|string|max:255',
            'bg_img'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'marker_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'     => 'required|in:Active,Inactive',
        ];

        return $rules;
    }
    public static function serviceStausUpdateRules()
    {
        $rules = [
            'id' => 'required|string|exists:sliders,id',
            'status' => 'required|in:Active,Inactive',
        ];

        return $rules;
    }
}
