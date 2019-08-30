<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$msg="";


if(isset($_POST['submit'])) {
  function sendEmail( $to, $from, $fromName, $position, $body, $attachment){
    $mail = new PHPMailer(TRUE);

    $mail->setFrom($from, $fromName);
    $mail->addAddress($to);
    $mail->Subject= $position;
    $mail->Body = $body;
    $mail->addAttachment($attachment);
    $mail->isHTML(false);

    // $mail->isSMTP();
    // $mail->Host = 'smtp.gmail.com';
    // $mail->Port = 587;
    // $mail->SMTPAuth = true;
    // $mail->SMTPSecure = 'tls';
    // $mail->SMTPDebug = 4;
    // $mail->Username = 'whitney.dubourg@gmail.com';
    // $mail->Password = 'abc123';

    return $mail->send();
  }
  
  $recipient = 'whitney.dubourg@gmail.com';
  $name = $_POST['sender'];
  $email = $_POST['email'];
  $position = $_POST['position'];
  $body = $_POST['message'];

  $file = "attachment/" . basename($_FILES['attachment']['name']);

  if(move_uploaded_file($_FILES['attachment']['tmp_name'], $file)) {

    if(sendEmail($recipient, $email, $name, $position, $body, $file)){
      $msg = "Great Success! You'll hear from us soon.";
    } else
      $msg = "OH NO! EPIC (email) FAIL *dun dun dun*";
  } else 
    $msg = "Uh oh. Better check your attachment, boo.";

}


?><!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <title>Wakin' Bakin | Apply</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="../site.webmanifest">
  <link rel="shortcut icon" href="../img/wb-icon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="../img/wb-icon.ico">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/main.css">

  <!-- font families -->

  <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
 
  <header>

    <div class="container">

      <figure class="logo">

        <a href="../index.html"><img src="../img/wb-logo.png" alt="wakin bakin logo"></a>
      
      </figure>

      <div class="content-wrapper">

        <h3>Open Everyday <span>7AM - 2PM</span></h3>

      </div>

        <nav>
          
          <ul class="main-nav">
            
            <li class="dropdown">

              <a>menus</a>

              <ul class="dropdown-menu">
                
                <li><a href="../menus/index.html#midcity">midcity</a></li>
                
                <li><a href="../menus/index.html#uptown">uptown</a></li>

                <li><a href="../menus/index.html#catering">catering</a></li>
                
                <li><a href="../menus/index.html#mmary">mother mary's</a></li>

              </ul>
              
            </li>
              
            <li class="dropdown">

              <a>locations</a>

              <ul class="dropdown-menu">
                
                <li><a href="../locations/index.html#midcity">midcity</a></li>
                
                <li><a href="../locations/index.html#uptown">uptown</a></li>
                
                <li><a href="../locations/index.html#mmary">mother mary's</a></li>
              
              </ul> 
            
            </li>

          </ul>
        
      </nav>

    </div>
  
  </header>


  <main>

    <section class="application">

      <div class="container">
      
        <h2>Join Our Team</h2>
        <h3>we care about our people, <span>let us prove it to you</span></h3>

        <div class="alert"><?php echo $msg; ?></div>

        <form class="form" method="post" action="index.php" enctype="multipart/form-data">
          
            
          <input class="name" type="text" name="sender" placeholder="First & Last Name" required>

          <input class="email" type="text" name="email" placeholder="name@email.com" required>

          <input class="position" type="text" name="position" placeholder="What position are your applying for?" required>

          <textarea class="message" name="message" rows="10"  placeholder="Tell us a little about you. (psst! no pressure)" required></textarea>

          <div class="form-btns">

            <div class="btn-container">

               
              <input type="file" class="file-btn" name="attachment" id="file" data-multiple-caption="{count} files selected" multiple required>
              <label for="file" class="attach-btn"><span>attach <i class="fas fa-paperclip"></i></span></label>
             

            </div>

            <input type="submit" name="submit" class="resume-btn" value="send your resume">

            </div>

          </form>

          <p>No resume? No problem. <span><strong>Click me!</strong></span></p>

      </div>

    </section>

  </main>

  <footer>

    <div class="container">

      <section class="address">
        
        <address class="banks">
          
          <h3>Midcity</h3>

          <p>4408 Banks St.<br />NOLA 70119<br />(504) 252-0343<br /><a href="mailto:wakingandbaking@gmail.com">wakingandbaking@gmail.com</a></p>
          
        </address>

        <address class="prytania">
          
          <h3>Uptown</h3>

          <p>3625 Prytania St.<br />NOLA 70122<br />(504) 534-5698<br /><a href="mailto:wakinbakinprytania@gmail.com">wakinbakinprytania@gmail.com</a></p>
          
        </address>

      </section>

      <div class="mother-mary">

        <a href="http://www.mothermarysnola.com" target="_blank" class="mother-mary-link"><button class="mother-mary-btn">Mother Mary's</button></a>

      </div>

      <p class="copyright">copyright Wakin' Bakin' | 2019</p>

    </div>

  </footer>

  <script src="../js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="../js/plugins.js"></script>
  <script src="../dist/js/swiper.min.js"></script>
  <script src="../js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
