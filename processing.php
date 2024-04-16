<?php
session_start();
require_once 'mail.inc.php';
require_once 'functions.inc.php';

var_dump($_POST);
var_dump($_SESSION);

/* Checks if the bot falls into the honeypot */
if(!empty($_POST['miel'])){
    echo 'spam tombé dans le pot de miel';
}

/* Checks if the bot sent the message with the name attributes non-modified via javascript */
else if(!empty($_POST['nom']) || !empty($_POST['nombre']) || !empty($_POST['courriel']) || !empty($_POST['courriel'])){
    echo 'spam qui ne lit pas le JS';
}

/* Checks if the bot or user didn't make an error of calculation */
else if($_SESSION['result']!==intval($_POST['number'])){
    echo 'spam ou gogol qui ne sait pas calculer';
}

/* 
    When in Rome, do as the romans do. (You're in France, speak french 🏉)
    Cheks if the message contains any cyrilic characters. If so, considered as a spam 
*/
else if(containsCyrillic($_POST['text'])){
    echo 'Spam : You\'re in France speak french';
}

/* Checks if all required fields are not empty and if email is valid */
else if( !empty($_POST['name']) && !empty($_POST['text']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo 'Message valide !';
    $mail = new Mail($_POST['name'],$_POST['email'],$_POST['text'],['dufourbaptiste08@gmail.com','vandamme4012@gmail.com']);
    $mail->send_mail();
    $_SESSION['email_sent'] = 1;
    header('location:index.php');
}

/* Last case : the user isn't a bot, but as made a mistake while inputing the message */
else{
    echo 'Vous vous êtes trompé en remplissant les champs';
}

//header('location:/');

