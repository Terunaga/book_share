<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
use App\Review;
use App\Author;
use Auth;

class BooksController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', array('only' => 'create'));
    }

    public function show($id)
    {
      $book   = Book::find($id);
      $review = Review::where('book_id', $id)
                      ->where('user_id', $book->user->id)
                      ->first();

      return view('books.show')->with(array('book' => $book, 'review' => $review));
    }

    public function create()
    {
      $book    = new Book();
      $authors = Author::all();
      $review  = new Review();

      return view('books.create')->with(array('book' => $book, 'authors' => $authors, 'review' => $review));
    }

    public function store(Request $request)
    {
      $user   = Auth::user();
      $author = Author::firstOrcreate(
        array(
          'first_name' => $request->first_name,
          'last_name'  => $request->last_name
        )
      );
      $book = $user->books()->create(
        array(
          'name'      => $request->name,
          'image'     => $request->image,
          'status'    => $request->status,
          'author_id' => $author->id
        )
      );
      $book->reviews()->create(
        array(
          'user_id' => $user->id,
          'rate'    => $request->rate,
          'comment' => $request->comment
        )
      );

      return redirect('/');
    }

    public function edit($id)
    {
      $book    = Book::find($id);
      $authors = Author::all();
      $review  = Review::where('book_id', $id)
                       ->where('user_id', $book->user->id)
                       ->first();

      if(Auth::user() != $book->user) {
        return redirect('/');
      }

      return view('books.edit')->with(array('book' => $book, 'authors' => $authors, 'review' => $review));
    }

    public function update($id, Request $request)
    {
      $book = Book::find($id);
      $book->update(
        array(
          'name'    => $request->name,
          'image'   => $request->image,
          'status'  => $request->status
        )
      );
      $book->author->update(
        array(
          'first_name' => $request->first_name,
          'last_name'  => $request->last_name
        )
      );
      Review::where('book_id', $book->id)
            ->where('user_id', Auth::user()->id)
            ->update(
                array(
                  'rate'    => $request->rate,
                  'comment' => $request->comment
                )
      );

      return redirect('/');
    }
}
