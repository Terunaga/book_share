<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;

class TopController extends Controller
{
    public function index()
    {
      $books = Book::orderBy('created_at', 'desc')->get();

      return view('top.index')->with('books', $books);
    }
}
