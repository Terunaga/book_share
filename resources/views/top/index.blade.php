@extends('layouts.master')

@section('content')

<div class="navbar-right top_register">
    <a class="btn btn-primary btn-lg top_register--button" href="/books/create" role="button">本を登録する</a>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">貸出可能な図書リスト</h1>
    </div>
</div>

<div class="row">
    @foreach($books as $book)
        @include('top.book', ['book' => $book])
    @endforeach
</div>

<hr>

<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
            <li>
                <a href="#">&laquo;</a>
            </li>
            <li class="active">
                <a href="#">1</a>
            </li>
            <li>
                <a href="#">2</a>
            </li>
            <li>
                <a href="#">3</a>
            </li>
            <li>
                <a href="#">4</a>
            </li>
            <li>
                <a href="#">5</a>
            </li>
            <li>
                <a href="#">&raquo;</a>
            </li>
        </ul>
    </div>
</div>

<hr>
@endsection
