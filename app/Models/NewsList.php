<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsList extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'source',
        'author',
        'title',
        'description',
        'url',
        'url_to_image',
        'published_time',
        'content',
        'created_at',
        'updated_at'
    ];
}
