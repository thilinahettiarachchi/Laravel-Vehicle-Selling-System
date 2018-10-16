<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title','model_year','price','condition','transmission','mileage','fuel','content','category_id','featured','slug','user_id'
    ];
    
    
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }
    
    
    protected $dates = ['deleted_at'];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    //tags . posts === tag, post === post_tag
    
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
