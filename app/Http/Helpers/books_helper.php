<?php

function author_names($authors)
{
  $author_names = $authors->map(function($author, $key) {
    return $author->full_name();
  });
  return $author_names->prepend('選択してください');
}

function loan_status()
{
  return [
    0 => '貸出可',
    1 => '貸出不可'
  ];
}

function book_rate()
{
  return [
    '' => '選択してください',
    10 => '5. 非常に良い',
    8  => '4. 良い',
    6  => '3. 普通',
    4  => '2. 悪い',
    2  => '1. 非常に悪い'
  ];
}

function returnBooks($loans)
{
  $books = [];
  foreach($loans as $loan) {
    array_push($books, $loan->book);
  }
  return $books;
}
