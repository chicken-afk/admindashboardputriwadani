<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentationImage extends Model
{
    use HasFactory;

    public function documentation()
    {
        return $this->belongsTo(Documentation::class, "documentation_id");
    }
}
