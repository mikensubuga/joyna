<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['comment_id','is_active','author','email','body','photo'];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
