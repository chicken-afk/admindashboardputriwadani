<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\DocumentationImage;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Documentation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description'];


    public function images(): HasMany
    {
        return $this->hasMany(DocumentationImage::class, 'documentation_id');
    }

    protected static function booted()
    {
        static::saved(function ($documentation) {
            if (request()->has('images')) {
                $documentation->images()->delete();
                foreach (request()->input('images') as $image) {
                    $documentation->images()->create(['image' => $image['image']]);
                }
            }
        });
    }
}
