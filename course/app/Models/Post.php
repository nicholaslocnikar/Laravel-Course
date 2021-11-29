<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // protected $table = 'posts';
    // protected $primaryKey = 'post_id';
    public $directory = "/images/";

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'content', 'path'];

    use HasFactory;

    public function user(){

        return $this->belongsTo('App\Models\User');

    }

    public function photos(){

        return $this->morphMany('App\Models\Photo', 'imageable');

    }

    public function tags(){

        return $this->morphToMany('App\Models\Tag', 'taggable');

    }

    public static function scopeLatestList($query){

        return $query->latest()->get();

    }

    public function getPathAttribute($value){

        $path = $this->directory . $value;

        return $path;
    }
}
