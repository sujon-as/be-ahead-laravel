<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentTitle extends Model
{
    use HasFactory;
    protected $table = 'appointment_titles';
    protected $fillable = [
        'title',
        'img'
    ];
    public static function rules($id = null)
    {
        $rules = [
            'title' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        return $rules;
    }
    public static function updateRules()
    {
        $rules = [
            'title' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        return $rules;
    }
}
