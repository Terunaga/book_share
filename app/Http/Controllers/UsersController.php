<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
      $user = User::find($id);

      return view('users.show')->with('user', $user);
    }

    public function edit($id)
    {
      $user = User::find($id);

      return view('users.edit')->with('user', $user);
    }

    public function update($id, Request $request)
    {
      User::find($id)->update(
        array(
          'name'  => $request->name,
          'email' => $request->email
        )
      );

      return redirect("/users/$id");
    }
}
