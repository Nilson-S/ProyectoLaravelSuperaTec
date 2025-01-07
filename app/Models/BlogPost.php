<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'title',
        'slug',
        'content',
        'published_at',
        'author_id',
    ];

    /**
     * Relación con el modelo User (autor del post).
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
