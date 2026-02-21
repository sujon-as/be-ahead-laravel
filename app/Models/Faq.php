<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    protected $fillable = ['question', 'answer'];
    public static function rules($id = null)
    {
        $rules = [
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ];

        return $rules;
    }
}
