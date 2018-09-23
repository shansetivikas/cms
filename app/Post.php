<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public $directory = "/images/";
    use SoftDeletes;
    //it thinks database name as posts(converts to lower case and adds s)
    //protected $table = 'posts' if the database name is different

//    protected $table = 'posts';
//
//    protected $primaryKey = 'id';// if primary key is other than id

 protected $dates = ['deleted_at'];

 protected $fillable =['title', 'content','path'];

 public function user(){
    return $this->belongsTo('App\User','id','user_id');
 }


 public function photos(){
    return $this->morphMany('App\photo','imageable');
 }

 public function tags(){
    return $this->morphToMany('App\tag','taggable');
 }

 public static function scopeLatest($query){
     return $query->orderBy('id','desc')->get();
 }

 public function getPathAttribute($value){
     return $this->directory.$value;
 }
}
