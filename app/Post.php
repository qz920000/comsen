<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
protected $guarded = ['id'];
public function categories()
{
return $this->belongsToMany('App\Category')->withTimestamps();
}
public function comments()
{
return $this->morphMany('App\Comment', 'post');
}

public function updateposts()
{
return $this->hasMany('App\Updateposts', 'post_id');
}

public function user()
{
return $this->belongsTo('App\User');
}

public function tags()
{
return $this->hasMany('App\Tag', 'post_id');
}
public function images()
{
return $this->hasMany('App\Image', 'post_id');
}

public function fileentries()
{
return $this->hasMany('App\Fileentry', 'post_id');
}
}
