<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = array(
      'first_name', 'last_name'
    );

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function full_name()
    {
      return $this->last_name . ' ' . $this->first_name;
    }
}
