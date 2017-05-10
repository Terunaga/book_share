<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = array('user_id', 'book_id', 'rate', 'comment');

    // associations
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function book()
    {
      return $this->belongsTo(Book::class);
    }
}
