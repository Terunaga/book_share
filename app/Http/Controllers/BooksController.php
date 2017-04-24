<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
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
      $book = Book::find($id);

      return view('books.show')->with('book', $book);
    }

    public function create()
    {
      $book    = new Book();
      $authors = Author::all();

      return view('books.create')->with(array('book' => $book, 'authors' => $authors));
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
      $user->books()->create(
        array(
          'name'      => $request->name,
          'rate'      => $request->rate,
          'image'     => $request->image,
          'comment'   => $request->comment,
          'author_id' => $author->id
        )
      );
      return redirect('/');
    }

    public function edit($id)
    {
      $book    = Book::find($id);
      $authors = Author::all();

      if(Auth::user() != $book->user) {
        return redirect('/');
      }

      return view('books.edit')->with(array('book' => $book, 'authors' => $authors));
    }

    public function update($id, Request $request)
    {
      $book = Book::find($id);
      $book->update(
        array(
          'name'    => $request->name,
          'rate'    => $request->rate,
          'image'   => $request->image,
          'comment' => $request->comment
        )
      );
      $book->author->update(
        array(
          'first_name' => $request->first_name,
          'last_name'  => $request->last_name
        )
      );

      return redirect('/');
    }
}
