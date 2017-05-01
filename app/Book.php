<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

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

    public function loans()
    {
      return $this->hasMany(Loan::class);
    }

    public function scopeLendable($query)
    {
      return $query->where('status', 0);
    }

    public function scopeNot_my_books($query)
    {
      if(Auth::user()){
        return $query->whereNotIn('user_id', [Auth::user()->id]);
      }
    }

    public function author_last_name()
    {
      return is_null($this->author) ? '' : $this->author->last_name;
    }

    public function author_first_name()
    {
      return is_null($this->author) ? '' : $this->author->first_name;
    }

    public function show_status()
    {
      switch($this->status)
      {
        case 0:
          return '貸出可';
          break;
        case 1:
          return '貸出不可';
          break;
      }
    }
}
