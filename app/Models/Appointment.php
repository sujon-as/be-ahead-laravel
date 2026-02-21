<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $fillable = [
        'name',
        'email',
        'date',
        'phone',
        'message',
    ];
    public static function rules($id = null)
    {
        $rules = [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'date'    => 'required|date|after:today',
            'phone'   => 'required|string',
            'message' => 'nullable|string|max:1000',
        ];

        return $rules;
    }
}
