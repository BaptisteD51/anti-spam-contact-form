<?php
session_start();
unset($_SESSION['result']);

require_once 'number.inc.php';

$numbers = [
    new Number(1, 'un.png'),
    new Number(2, 'deux.png'),
    new Number(3, 'trois.png'),
    new Number(4, 'quattre.png'),
    new Number(5, 'cinq.png'),
    new Number(6, 'six.png'),
    new Number(7, 'sept.png'),
    new Number(8, 'huit.png'),
    new Number(9, 'neuf.png'),
];

$number1 = $numbers[random_int(0, 8)];
$number2 = $numbers[random_int(0, 8)];

$_SESSION['result'] = $number1->value + $number2->value;

require_once 'header.inc.php';

require_once 'form.inc.php';

require_once 'footer.inc.php';