<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = array(
      'name', 'rate', 'image', 'comment', 'status', 'author_id', 'user_id'
    );

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function author()
    {
      return $this->belongsTo(Author::class);
    }

    public function author_last_name()
    {
      return is_null($this->author) ? '' : $this->author->last_name;
    }

    public function author_first_name()
    {
      return is_null($this->author) ? '' : $this->author->first_name;
    }
}
