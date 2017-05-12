<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;

class TopController extends Controller
{
    public function index()
    {
      $lendable_books  = Book::lendable()->orderBy('created_at', 'desc')->paginate(10);
      $borrowing_books = Book::being_borrowed()->orderBy('created_at', 'desc')->paginate(10);
      $popular_books   = Book::not_my_books()->orderBy('created_at', 'desc')->paginate(10);
      $new_books       = Book::orderBy('created_at', 'desc')->paginate(10);

      return view('top.index')->with(
        array(
          'lendable_books'  => $lendable_books,
          'borrowing_books' => $borrowing_books,
          'popular_books'   => $popular_books,
          'new_books'       => $new_books
        )
      );
    }
}
