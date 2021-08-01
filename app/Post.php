<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['title','description','content','image','published_at','category_id'];

    
    public function category()
    {
    	return $this->belongsTo(Category::class);

    	//	or
    	//return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
    public function hasTag($tagId)
    {
    	return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
}
