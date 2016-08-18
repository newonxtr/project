<?php
   $con_error = "Could not connect to database";

    $servername = 'localhost';
    $username="newon1";
    $password="Joenin@30";
    $mysql_db = "contactus1";

    $con= mysqli_connect($servername,$username,$password) or die('Error');
    mysqli_select_db($con,$mysql_db) or die($con_error);

    require 'phpmailer/PHPMailerAutoload.php';
    date_default_timezone_set('Asia/Calcutta');
   // $date = date('Y-m-d H:i:s');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];
    $sql = "INSERT into contact(name, email, contact,message)VALUES ('" . $name . "','" . $email . "', '" . $contact . "','" . $message . "')";
    if ($con->query($sql) === TRUE) {
        $body = "Hey This is from Cryoboard";
        $subject="Cryoboard";
        $mail = new PHPMailer();
        $mail->IsHTML(true); 
        $mail->Host = "relay-hosting.secureserver.net";
        $mail->From = $email;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->WordWrap = 50;
        $mail->AddAddress("newon.gonsalves@gmail.com");
        $subject = $_POST['name'];
        $message = $_POST['message'];
        mail($email,$subject,$message,"From:".$From);
        if(!$mail->send()) {
            echo "";
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else{
            echo "<br>We received your message. Thank you.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
?>