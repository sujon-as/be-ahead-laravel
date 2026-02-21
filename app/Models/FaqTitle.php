<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqTitle extends Model
{
    use HasFactory;
    protected $table = 'faq_titles';
    protected $fillable = ['title_1', 'title_2', 'yt_video_link'];
    public static function rules($id = null)
    {
        $rules = [
            'title_1' => 'required|string',
            'title_2' => 'required|string',
            'yt_video_link' => 'required|string|url',
        ];

        return $rules;
    }
}
