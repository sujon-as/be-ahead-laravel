<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;
    protected $table = 'volunteers';
    protected $fillable = [
        'f_name',
        'l_name',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'image',
        'status',
    ];
    public static function rules($id = null)
    {
        $rules = [
            'f_name'    => 'required|string|max:255',
            'l_name'    => 'required|string|max:255',
            'phone'    => 'required|string|unique:volunteers,phone,' . $id,
            'email'    => 'required|email|unique:volunteers,email,' . $id,
            'address'    => 'required|string|max:255',
            'city'    => 'required|string|max:255',
            'state'    => 'required|string|max:255',
            'zip'    => 'required|string|max:255',
            'country'    => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status'     => 'required|in:Active,Inactive',
        ];

        return $rules;
    }
}
