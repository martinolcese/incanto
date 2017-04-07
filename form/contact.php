<?php

// configure
$from = ('email');
$sendTo = 'valdes10olcese@live.com';
$subject = ('subject');
$fields = array('name' => 'Nome', 'phone' => 'Telefone', 'email' => 'E-mail', 'subject' => 'Assunto', 'message' => 'Mensagem'); // array variable name => Text to appear in the email
$okMessage = 'Mensagem enviada! Muito obrigado! Em até 24 hrs entraremos em contato.';
$errorMessage = 'Ups, parece que tem um erro. Por favor, tente novamente.';

// let's do the sending

try
{
    $emailText = "Nova mensagem gerada do site Incanto!";

    foreach ($_POST as $key => $value) {

        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
    
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
else {
    echo $responseArray['message'];
}
