<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'title',
        'description',
        'image',
        'filepath',
        'filename',
        'mime',
        'original_filename'
    ];
     protected $guarded = ['id'];
    public function post()
    {
    return $this->belongsTo('App\Post');
    }
}
