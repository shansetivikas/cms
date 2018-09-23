<?php

use App\Country;
use App\Photo;
use App\Post;
use App\User;
use App\Tag;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/hello', function(){
//   return view('welcome');
//});
//
//Route::get('/posts/admin', function(){
//   return "you are in posts page";
//});
//
//
//Route::get('/post/{id}/{name}', function($id, $name){
//
//     return "This is post number ".$id. " ". $name;
//});
//
//Route::get('admin/posts/example', array('as'=>'admin.home' ,function(){
//
//    $url = route('admin.home');
//    return 'this url is'. $url;
//
//}));

//Route::get('/post/{id}', 'PostsController@index');

//Route::resource('posts','PostsController');


//Route::get('contact','PostsController@contact');
//
//Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');

//Database raw sql queries
use Illuminate\Support\Facades\DB;

//Route::get('/insert',function(){
//
//    DB::insert('insert into posts(title, content) values(?,?)', ['php with laravel', 'Laravel is the best language']);
//
//});

//Route::get('/read', function(){
//
//    $results = DB::select('select * from posts where id=?',[1]);
//
////    return var_dump($results);
//
//    foreach($results as $post){
//        return $post->title;
//    }
//});


//Route::get('/update', function(){
//    $updated = DB::update('update posts SET title = "updated title" where id=?',[1]);
//
//    return $updated;
//});


//Route::get('/delete', function(){
//
//    $deleted = DB::delete('delete  from posts where id = ?', [1]);
//    return $deleted;
//});


//Eloquent Databases

//Route::get('/read', function(){
//
//    $posts = Post::all();
//
//    foreach($posts as $post){
//        return $post->title;
//    }
//});


//Route::get('/find', function(){
//
//    $post = Post::find(2);
//
//    return $post->title;
//});

//Route::get('/findwhere', function(){
//
//    $posts = Post::where('id',2)->orderBy('id','desc')->take(1)->get();
//    return $posts;
//
//});
//
//Route::get('/findmore', function(){
//
////    $post = Post::findOrFail(2);
////    return $post;
//
//    $posts = Post::where('users_count', '<', 50)->firstorFail();
//
//});


//Route::get('/basicinsert', function(){
//     $post = new Post;
//     $post->title = 'new Orm title';
//     $post->content = 'Wow eloquent is really cool';
//
//     $post->save();
//});
//
//Route::get('/basicupdate', function(){
//   $post = Post::find(2);
//   $post->title = 'Hello';
//
//   $post->save();
//});

//Mass assignment
//Route::get('/create', function(){
//
//    Post::create(['title'=>'THE CREATE METHOD', 'content'=>'wow I\'am learning php']);
//});

//Route::get('/update', function(){
//    Post::where('id',2)->where('is_admin',0)->update(['title'=>'New php title', 'content'=>'Php is easy']);
//});


//Route::get('/basicdelete', function(){
//
//    $post= Post::find(2);
//    $post->delete();
//});

//Route::get('/delete2', function(){
//  Post::destroy(3);
//  Post::destroy([4,5]);
//});


//Route::get('/softdelete', function(){
//  Post::find(1)->delete();
//});

//Route::get('/readsoftdelete', function(){
//
////    $post = Post::find(1);
////    return $post;
//// $post =  Post::withTrashed()->where('id',1)->get();
//// return $post;
//
//    $post =  Post::onlyTrashed()->where('is_admin',0)->get();
//    return $post;
//});

//Route::get('/restore', function(){
////    Post::withTrashed()->restore();
// Post::withTrashed()->where('is_admin',0)->restore();
//});

//Route::get('/forcedelete',function(){
// Post::withTrashed()->where('id',1)->forceDelete();
//});

//Eloquent relationships

//one to one
//Route::get('/user/{id}/post', function($id){
//
//    $user =  User::find($id)->post->title;
//
//    return $user;
//
//});

//inverse
//Route::get('/post/{id}/user', function($id){
//   return Post::find($id)->user->name;
//});

//One to Many

//Route::get('/posts', function(){
//
//    $user = User::find(1);
//
//    foreach($user->posts as $post){
//              echo $post->title.'<br>';
//    }
//
//});

//Route::get('/user/{id}/role', function($id){
////    $user = User::find($id);
////
////    foreach($user->roles as $role){
////         return $role->name;
////    }
//
////    $user = User::roles()->orderBy('id', 'desc')->get();
//
//});

//Route::get('user/pivot', function(){
//
//     $user =User::find(1);
//     foreach($user->roles as $role){
//         echo $role->pivot->created_at;
//     }
//});

//Route::get('/user/country', function(){
//
//    $country = Country::find(4);
//
//    foreach($country->posts as $post){
//        echo $post->title;
//    }
//
//
//});
//
////polymorphic relations
//Route::get('user/photos', function(){
//   $user = User::find(1);
//   foreach($user->photos as $photo){
//       return $photo;
//   }
//});
//
//Route::get('user/photos', function(){
//    $user = User::find(1);
//     foreach($user->photos as $photo){
//        return  $photo;
//     }
//});

//Route::get('photo/{id}/post', function($id){
//
//    $photo = Photo::findOrFail($id);
//    return $photo->imageable;
//
//});

//Polymorphic Many to Many

//Route::get('/post/tag', function(){
//
//    $post = Post::find(1);
//    foreach($post->tags as $tag){
//        echo $tag->name;
//    }
//});

//Route::get('/tag/post', function(){
//
//    $tag = Tag::find(2);
//    foreach($tag->posts as $post){
//       return $post->title;
//    }
//
//});

//CRUD APPLICATION

Route::resource('/posts', 'PostsController');

//Route::group(['middleware'=>'web'], function(){
////    Route::resource('/posts', 'PostsController');
//});

Route::get('/dates', function(){

     $date = new DateTime('+1 week');

     echo $date->format('m-d-Y');

     echo '<br>';

     echo Carbon::now()->addDay(10)->diffForHumans();

     echo '<br>';

     echo Carbon::now()->subMonths(4)->diffForHumans();

     echo '<br>';
     echo Carbon::now()->yesterday();


});


Route::get('/getname', function(){

    $user = User::find(1);
    echo $user->name;

});

Route::get('/setname', function(){

    $user = User::find(1);
    $user->update(['name'=>'kumar']);
});