<?php

namespace App\Models;

use App\Helpers\UniqueSlug;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;
        protected $gurded = ['id'];


    protected $fillable = [
       
        'title',
        'description',
        'image',
    ];



   // public function getImageAttribute($value)
    //{
      //  $storage = Storage::disk('public');
        
      //  if(!empty($value) && $storage->exists($value)) 
       // {
        //    return Storage::disk('public')->url($value);
       // }
       ///  return $value;
  //  }
  public function getExcerptAttribute()
  {

     // return Str::limit($this->descripton, Post::EXCERPT_LENGTH);
  
}

  public function getNextAttribute()
    {

        return static::select('id', 'title', 'slug')->where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    
}

public function getPreviousAttribute()
{
    return static::select('id', 'title', 'slug')->where('id', '<', $this->id)->orderBy('id', 'desc')->first();
}

public function user(): BelongsTo
 {
        return  $this->belongsTo(User::class, 'user_id', 'id');
 }

}