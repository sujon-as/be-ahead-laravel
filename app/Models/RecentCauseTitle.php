<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentCauseTitle extends Model
{
    use HasFactory;
    protected $table = 'recent_cause_titles';
    protected $fillable = ['title_1', 'title_2'];
    public static function rules($id = null)
    {
        $rules = [
            'title_1'    => 'required|string',
            'title_2'    => 'required|string',
        ];

        return $rules;
    }
}
