<?php
session_start();
unset($_SESSION['result']);

require_once 'classes/number.inc.php';

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

require_once 'views/header.inc.php';

if(!isset($_SESSION['email_sent'])){
    if(isset($_SESSION['error'])){
        require_once 'views/error_message.inc.php';
    }
    require_once 'views/form.inc.php';
}else{
    require_once 'views/succes_message.inc.php';
}

require_once 'views/footer.inc.php';

unset($_SESSION['email_sent']);
unset($_SESSION['error']);
