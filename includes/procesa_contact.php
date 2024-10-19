<?php 

        $user= $_POST['users'];
        $name= $_POST['name'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $message_form= $_POST['message'];

        $para = 'albertormspecial@gmail.com' . ", " ;
        $para .= 'albertormspecial@gmail.com' ;
        $title .= 'Email Users';
    
        //MENSAJE
        $message = '
        <html>
            <head>
            <title>Email from '. $user .'</title>
            </head>
                <body>
                    <div style="text-align:center">
                      <h1>Email alberto9rm -Blog Fifty-Something</h1>
                      <img src="http://localhost/fifty-something/assets/img/1.png" width= 150">
                      <h3>Users: '. $user .'</h3>
                      <h3>Name: '. $name .'</h3>
                      <h3>Email: '. $email .'</h3>
                      <h3>Phone: '. $phone .'</h3>
                      <h3>Message: '. $message_form .'</h3>
                      <p>"This is an email sent by a user from Blog-Fifty-Something"</p>
                      </div>
                </body>
                </html>
            ';
        //PARA ENVIAR UN CORREO HTML, DEBE ESTABLECER LA CABECERA CONTENT-TYPE
        $cabeceras = 'NIME-Version 1.0' . "\r\n";
        $cabeceras .='Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $cabeceras .= 'From: De: '. $email . "\r\n";

        if($user == '' || $name == '' || $email = '' || $message_form== ''){
            header("Location:contact.php?error=" . urlencode("You must fill in all the fields."));
        }else {
        mail ($para, $title, $message, $cabeceras );
            header("Location: contact.php?exito=". urldecode("Message has been sent successfully."));
        }

?>