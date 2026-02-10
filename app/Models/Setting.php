<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'site_name',
        'address',
        'facebook',
        'rss_feed',
        'google_plus',
        'pinterest',
        'instagram',
        'welcome_msg',
        'logo',
        'fav_icon',
        'email',
        'phone',
        'footer_txt',
        'copyright_mgs',
    ];
}
