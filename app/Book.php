<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Book extends Model
{
    protected $fillable = array(
      'name', 'rate', 'image', 'comment', 'status', 'author_id', 'user_id'
    );

    // associations
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

    // instance methods
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

    public function can_lend()
    {
      return $this->status === 0;
    }

    public function on_loan()
    {
      return $this->status === 2;
    }

    public function reserved_by_current_user()
    {
      $reserved_records= Loan::where('borrower_id', Auth::user()->id)
                             ->where('book_id', $this->id)
                             ->whereIn('status', [0, 1, 4])
                             ->get();
      $counts = count($reserved_records);
        if($counts != 0){
            return true;
        }
    }

    public function being_borrowed_by_current_user()
    {
      $reserved_records= Loan::where('borrower_id', Auth::user()->id)
                             ->where('book_id', $this->id)
                             ->where('status', 2)
                             ->get();
      $counts = count($reserved_records);
        if($counts != 0){
            return true;
        }
    }

    // scopes
    public function scopeApplying($query)
    {
      return $query->where('loans.status', '=', 0);
    }

    public function scopeTo_borrow($query)
    {
      return $query->where('loans.status', '=', 1);
    }

    public function scopeBorrowing($query)
    {
      return $query->where('loans.status', '=', 2);
    }

    public function scopeBorrowed($query)
    {
      return $query->where('loans.status', '=', 3);
    }

    public function scopeLendable($query)
    {
      return $query->where('status', 0);
    }

    public function scopeBeing_borrowed($query)
    {
      return $query->where('status', 2);
    }

    public function scopeNot_my_books($query)
    {
      if(Auth::user()){
        return $query->whereNotIn('user_id', [Auth::user()->id]);
      }
    }
}
