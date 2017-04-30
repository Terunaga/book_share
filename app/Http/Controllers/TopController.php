<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;

class TopController extends Controller
{
    public function index()
    {
      $books = Book::lendable()->orderBy('created_at', 'desc')->paginate(10);

      return view('top.index')->with('books', $books);
    }
}
