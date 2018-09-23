<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Overtrue\LaravelFollow\Traits\CanBeVoted;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;
use Carbon\Carbon;
use Spatie\Tags\HasTags;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use CanBeVoted, CanBeLiked, CanBeFavorited, HasTags, Commentable;
    /**
    * The Attributes that are mass assignable
    *
    * @var array
    */
    protected $fillable = [
      'body', 'user_id', 'post_type', 'embed_link',
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function upload()
    {
      return $this->hasManu('App\Upload');
    }
}
