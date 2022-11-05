<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "Comment";

    // Một cmt thì sẻ thuộc duy nhất một tin tức
    public function tintuc()
    {
    	return $this->belongsTo('App\TinTuc','idTinTuc','id');
    }

    // Một Comment chỉ thuộc một user,và một user thì có một hoặc nhiều comment
    public function user() 
    {
    	return $this->belongsTo('App\User','idUser','id');   
    }															
}
