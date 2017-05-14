<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use App\Loan;
use Auth;

class LendsController extends Controller
{
    public function index()
    {
        $books = Auth::user()->lend_books()->applying()->get();

        return view('users.lends.index')->with('books', $books);
    }

    public function update($lender_id, $loan_id, Request $request)
    {
        $loan = Loan::find($loan_id)->update(
            array('status' => $request->status)
        );
        return redirect("/users/{$lender_id}/lends");
    }
}
