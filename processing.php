<?php
session_start();
require_once 'classes/mail.inc.php';
require_once 'functions.inc.php';
require_once 'config.php';

/* Checks if the bot falls into the honeypot */
if(!empty($_POST['miel'])){
    $_SESSION['error'] = "honeypot";
}

/* Checks if the bot sent the message with the name attributes non-modified via javascript */
else if(!empty($_POST['nom']) || !empty($_POST['nombre']) || !empty($_POST['courriel']) || !empty($_POST['courriel'])){
    $_SESSION['error'] = "javascript";
}

/* Checks if the bot or user didn't make an error of calculation */
else if($_SESSION['result']!==intval($_POST['number'])){
    $_SESSION['error'] = "calculation";
}

/* 
    When in Rome, do as the romans do. (You're in France, speak french 🏉)
    Cheks if the message contains any cyrilic characters. If so, considered as a spam 
*/
else if(containsCyrillic($_POST['text'])){
    $_SESSION['error'] = "cyrillic";
}

/* Checks if all required fields are not empty and if email is valid */
else if( !empty($_POST['name']) && !empty($_POST['text']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo 'Message valide !';
    $mail = new Mail($_POST['name'],$_POST['email'],$_POST['text'],$emails);
    $mail->send_mail();
    $_SESSION['email_sent'] = 1;
    
}

/* Last case : the user isn't a bot, but as made a mistake while inputing the message */
else{
    $_SESSION['error'] = "user_error";
}

header('location:index.php');
