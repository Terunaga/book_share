<?php

namespace App\Http\Controllers\books;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Loan;
use App\Book;
use Auth;

class ReservesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', array('only' => 'store'));
    }

    public function store($id)
    {
      $book = Book::find($id);
      $book->loans()->create(
        array(
          'borrower_id' => Auth::user()->id,
          'lender_id'   => $book->user->id,
          'status'      => 4,
        )
      );
      return redirect('/');
    }
}
