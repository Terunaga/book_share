<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // associations
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function borrow_loans()
    {
        return $this->hasMany(Loan::class, 'borrower_id');
    }

    public function lend_loans()
    {
        return $this->hasMany(Loan::class, 'lender_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function borrow_books()
    {
        return $this->belongsToMany(Book::class, 'loans', 'borrower_id', 'book_id');
    }

    public function lend_books()
    {
        return $this->belongsToMany(Book::class, 'loans', 'lender_id', 'book_id');
    }

    // instance methods
    public function requestedBookCounts()
    {
        $applying_records = $this->lend_loans()->applying()->get();
        $counts = count($applying_records);
        if($counts != 0){
            return $counts;
        }
    }

    public function writableReviews()
    {
        $borrowed_books = $this->borrow_books()->borrowed()->get();
        $writable_books = [];
        foreach($borrowed_books as $book){
            if (count($book->reviews->where('user_id', $this->id)) === 0){
                array_push($writable_books, $book);
            };
        };
        return $writable_books;
    }
}
