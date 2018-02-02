<?php
 
ini_set('display_errors', 1);
 
error_reporting(E_ALL);
 
$from = "contato@webbin.com.br";
 
$to = "lourenco.tx@gmail.com";
 
$subject = "Verificando o correio do PHP";
 
$message = msgHTML(file_get_contents('contents.html'), __DIR__);
 
$headers = "De:". $from;
 
mail($to, $subject, $message, $headers);
 
echo "A mensagem de e-mail foi enviada.";
 
?>
