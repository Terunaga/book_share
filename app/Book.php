<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = array(
      'name', 'rate', 'image', 'comment', 'status', 'user_id'
    );

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function author()
    {
      return $this->belongsTo(Author::class);
    }
}
