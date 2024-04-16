<?php
function containsCyrillic(string $text):bool{
    $regex = '/[А-Яа-я]/';
    return preg_match($regex, $text);
}