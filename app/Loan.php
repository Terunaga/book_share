<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = array(
      'borrower_id','lender_id', 'book_id', 'status', 'start_date', 'finish_date', 'comment'
    );

    public function book()
    {
      return $this->belongsTo(Book::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function scopeApplying($query)
    {
      return $query->where('status', 0);
    }

    public function scopeTo_borrow($query)
    {
      return $query->where('status', 1);
    }

    public function scopeBorrowing($query)
    {
      return $query->where('status', 2);
    }

    public function scopeBorrowed($query)
    {
      return $query->where('status', 3);
    }
}
