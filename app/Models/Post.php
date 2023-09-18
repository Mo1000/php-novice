<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */

    //pour pouvoir creer avec un tableeau
    protected $fillable = [
        'title', 'slug', 'content'
    ];

    //no autorisé en liste
    protected $guarded = [];
}
