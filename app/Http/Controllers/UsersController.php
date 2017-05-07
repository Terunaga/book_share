<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
      $user            = User::find($id);
      $my_books        = $user->books()->get();
      $applying_books  = $user->loan_books()->applying()->get();
      $to_borrow_books = $user->loan_books()->to_borrow()->get();
      $borrowing_books = $user->loan_books()->borrowing()->get();
      $borrowed_books  = $user->loan_books()->borrowed()->get();

      // eval(\Psy\SH());
      return view('users.show')->with(
        array(
          'user'             => $user,
          'my_books'         => $my_books,
          'applying_books'   => $applying_books,
          'to_borrow_books'  => $to_borrow_books,
          'borrowing_books'  => $borrowing_books,
          'borrowed_books'   => $borrowed_books,
        )
      );
    }

    public function edit($id)
    {
      $user = User::find($id);

      return view('users.edit')->with('user', $user);
    }

    public function update($id, Request $request)
    {
      // eval(\Psy\SH());
      User::find($id)->update(
        array(
          'name'  => $request->name,
          'email' => $request->email
        )
      );

      return redirect("/users/$id");
    }
}
