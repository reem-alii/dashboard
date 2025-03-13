<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory, HasTranslations, HasTranslatableSlug;
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
    public $translatable = [
         'name',
         'slug',
         'description',
        ];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::createWithLocales(['en', 'ar'])
            ->generateSlugsFrom(function($model, $locale) {
                return "{$model->name}";
            })
            ->saveSlugsTo('slug')
            ->usingLanguage(false);
    }

}
