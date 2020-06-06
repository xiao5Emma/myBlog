<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleInfo extends Model
{
    protected $fillable = ['article_id','watch'];
    public $timestamps = false;

}
