<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment_product';
    protected $fillable = ['product_id', 'user_id', 'subject', 'advantages', 'disadvantages','comment_text','status'];
    public $timestamps = false;
}
