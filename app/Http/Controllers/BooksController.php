<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
use Auth;

class BooksController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', array('only' => 'create'));
    }

    public function create()
    {
      $book = new Book();

      return view('books.create')->with('book', $book);
    }

    public function store(Request $request)
    {
      $user = Auth::user();
      $user->books()->create(
        array(
          'name'    => $request->name,
          'rate'    => $request->rate,
          'image'   => $request->image,
          'comment' => $request->name,
        )
      );
      return redirect('/');
    }

    public function edit($id)
    {
      $book = Book::find($id);

      return view('books.edit')->with('book', $book);
    }
}
