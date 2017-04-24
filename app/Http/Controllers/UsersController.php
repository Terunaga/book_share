<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
      $user  = User::find($id);
      $books = $user->books()->get();

      return view('users.show')->with(array('user' => $user, 'books' => $books));
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
