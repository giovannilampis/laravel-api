<?php

namespace App\Models\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "slug",
        "subtitle",
        "description",
        "url",
        "img_url",
        "category_id"
    ];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    
}
