<?php

function author_names($authors)
{
  $author_names = $authors->map(function($author, $key) {
    return $author->full_name();
  });
  return $author_names->prepend('選択してください');
}
