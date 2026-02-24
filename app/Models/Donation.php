<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $table = 'donations';
    protected $fillable = [
        'amount',
        'pts',
        'f_name',
        'l_name',
        'email',
        'phone',
        'address_1',
        'address_2',
        'city',
        'zip',
        'note',
        'img',
    ];
    public static function rules($id = null)
    {
        $rules = [
            'amount'    => 'required|numeric|min:0|max:99999999.99',
            'pts'       => 'required|string|max:255|in:"one_time", "weekly", "monthly", "yearly"',
            'f_name'    => 'required|string|max:255',
            'l_name'    => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'required|string',
            'address_1' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'city'      => 'required|string|max:100',
            'zip'       => 'required|string|max:20',
            'note'      => 'nullable|string',
            'img'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        return $rules;
    }
}
