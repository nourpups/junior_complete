<?php

namespace App\Actions;

class PrettifyWordsAction
{
 public function __invoke(array $words): string
 {
    $prettyWords = array_map(fn($word) =>  '«'.$word.'»', $words);

    return join(', ', $prettyWords);
 }

}