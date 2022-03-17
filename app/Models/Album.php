<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'genre_id',
        'history',
        'photo'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
