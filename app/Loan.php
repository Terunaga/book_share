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
}
