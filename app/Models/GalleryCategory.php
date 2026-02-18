<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryCategory extends Model
{
    use HasFactory;
    protected $table = 'gallery_categories';
    protected $fillable = ['title'];

    public static function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
        ];

        return $rules;
    }
    public function images() : HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }
}
