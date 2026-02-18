<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    use HasFactory;
    protected $table = 'gallery_images';
    protected $fillable = [
        'title',
        'gallery_category_id',
        'image',
    ];
    public static function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'gallery_category_id' => 'required|integer|exists:gallery_categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        return $rules;
    }
    public function category() : BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id');
    }
}
