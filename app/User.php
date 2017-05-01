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

    public function applying_books()
    {
        return $this->belongsToMany(Book::class, 'loans', 'borrower_id', 'book_id');
    }

    public function requestedBookCounts()
    {
        $applying_records = $this->lend_loans()->applying()->get();
        $counts = count($applying_records);
        if($counts != 0){
            return $counts;
        }
    }

    public function applyingBooks()
    {
        $loans = $this->borrow_loans()->applying()->get();
        return returnBooks($loans);
    }

    public function toBorrowBooks()
    {
        $loans = $this->borrow_loans()->to_borrow()->get();
        return returnBooks($loans);
    }

    public function borrowingBooks()
    {
        $loans = $this->borrow_loans()->borrowing()->get();
        return returnBooks($loans);
    }

    public function borrowedBooks()
    {
        $loans = $this->borrow_loans()->borrowed()->get();
        return returnBooks($loans);
    }
}
