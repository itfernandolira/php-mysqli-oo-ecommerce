<?php
    error_reporting(E_ERROR | E_PARSE);
    require_once("connection/connection.php");

    $endereco=$_POST["email"];

    if (!filter_var($endereco, FILTER_VALIDATE_EMAIL)) {
        echo "Tem de indicar um e-mail válido!";
      }
    else {   
        $sql="insert into newsletter(endereco) values('$endereco')";

        $csogani->query($sql);
    
        $csogani->close();

        $to = $endereco;
        $subject = "OGANI - Subscrição de newsletter";

        $message = "
            <html>
            <head>
            <title>OGANI - Subscrição de newsletter</title>
            </head>
            <body>
            <p>Obrigado pela subscrição da nossa newsletter!</p>
            </body>
            </html>
            ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <it.fernandolira@gmail.com>' . "\r\n";
        $headers .= 'Cc: it.fernandolira@gmail.com' . "\r\n";

        $headers .= "Reply-To: OGANI <it.fernandolira@gmail.com>\r\n";
        $headers .= "Return-Path: OGANI <it.fernandolira@gmail.com>\r\n";
        $headers .= "Organization: OGANI\r\n";

        mail($to,$subject,$message,$headers);

        echo "A subscrição foi realizada com sucesso. Verifique a sua caixa de correio. Obrigado!";
    }


?>