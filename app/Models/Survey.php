<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'status', 'expire_date', 'created_at', 'updated_at', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public function questions()
    {

        return $this->hasMany(SurveyQuestion::class);
    }
}
