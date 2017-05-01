<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Loan;
use App\Book;
use Auth;

class BorrowsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', array('only' => 'create'));
    }

    public function create($id)
    {
      $book = Book::find($id);
      $loan = new Loan();

      return view('books.borrows.create')->with(array('book' => $book, 'loan' => $loan));
    }

    public function store($id, Request $request)
    {
      $book = Book::find($id);
      $book->update(array('status' => 2));
      $book->loans()->create(
        array(
          'borrower_id' => Auth::user()->id,
          'lender_id'   => $book->user->id,
          'status'      => 0,
          'comment'     => $request->comment,
          'start_date'  => $request->start_date,
          'finish_date' => $request->finish_date
        )
      );
      return redirect('/');
    }
}
