<?php
if (isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $mobile = $_POST['mobile'];
  $Message = $_POST['Message'];
  header("location:home.html");
}
?>


<?php
require_once './vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('hnagar1305@gmail.com')
    ->setPassword('nagar@5605705');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Thank you for making an appointement:</p>
       <p>Name: <b>'.$name.'</b></p>
       <p><b>'.$email.'</b></p>
       <p>Date: <b>'.$date.'</b></p>
       <p>Time: <b>'.$time.'</b></p>
       <p>Mobile No: <b>'.$mobile.'</b></p>
       <p>Message: <b>'.$Message.'</b></p>
      </div>
    </body>

    </html>';



    // Create a message
    $k = (new Swift_Message('New Appointement'))
        ->setFrom('hnagar1305@gmail.com')
        ->setTo(['hnagar1305@gmail.com',$email])
        ->setBody($body, 'text/html');
    // Send the message
    $result = $mailer->send($k);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
