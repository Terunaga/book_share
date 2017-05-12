<?php

namespace App\Http\Controllers\books;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use App\Review;
use Auth;

class ReviewsController extends Controller
{
    public function create($id)
    {
      $book   = Book::find($id);
      $review = new Review();

      return view('books.reviews.create')->with(array('book' => $book, 'review' => $review));
    }

    public function store($id, Request $request)
    {
      $book   = Book::find($id);
      $book->reviews()->create(
        array(
          'user_id' => Auth::user()->id,
          'rate'    => $request->rate,
          'comment' => $request->comment
        )
      );

      return redirect('/');
    }
}
