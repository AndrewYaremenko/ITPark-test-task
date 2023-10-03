<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'publication_status',
        'poster_link'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genres', 'film_id', 'genre_id');
    }

    public function publish()
    {
        if ($this->publication_status) {
            return response()->json(['error' => 'Film has already been published'], 400);
        }
        $this->update(['publication_status' => true]);

        return response()->json(['message' => 'Film was successfully published'], 200);
    }
}