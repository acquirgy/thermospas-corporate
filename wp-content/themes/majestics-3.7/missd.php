<?php
// should be Sanitized first, last, and email
$FullName = $_POST['fullName'];
$Address_1 = $_POST['address_1'];
$Address_2 = $_POST['address_2'];
$City = $_POST['city'];
$State = $_POST['statee'];
$Zip = $_POST['zip'];
$Phone = $_POST['phone'];
$Email = $_POST['email'];
$Type = $_POST['tub_type'];
$Size = $_POST['tub_size'];
$Seating = $_POST['seat_add'];
$Cabinet = $_POST['tub_cabinet'];
$Shell = $_POST['tub_shell'];
$Jet = $_POST['jet'];
$Bubbles = $_POST['bubble'];
$Insulation = $_POST['insulation'];
$Cover = $_POST['cover'];
$Heater = $_POST['heater'];
$Filtration = $_POST['filtration'];
$Purification = $_POST['purification'];
$Feature = $_POST['feature'];
$MsDToken = $_POST['msDToken'];
//
//session_start();
//require_once "folder-name/database.php";
//db_connect();
//require_once "folder-name/auth.php";
//$current_user = current_user();


/***************************************************\
 * PHP 4.1.0+ version of email script. For more
 * information on the mail() function for PHP, see
 * http://www.php.net/manual/en/function.mail.php
\***************************************************/


// First, set up some variables to serve you in
// getting an email.  This includes the email this is
// sent to (yours) and what the subject of this email
// should be.  It's a good idea to choose your own
// subject instead of allowing the user to.  This will
// help prevent spam filters from snatching this email
// out from under your nose when something unusual is put.

$sendTo_1 = "jmurrett@thermospas.com";
$subject = "Thermospas Hot Tub Quote Request missd-php";

// variables are sent to this PHP page through
// the POST method.  $_POST is a global associative array
// of variables passed through this method.  From that, we
// can get the values sent to this page from Flash and
// assign them to appropriate variables which can be used
// in the PHP mail() function.

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=iso-8859-1' . "\r\n";


// header information not including sendTo and Subject
// these all go in one variable.  First, include From:
$headers .= "From: " . $Email . "\r\n";
// next include a replyto
$headers .= "Reply-To: " . $Email . "\r\n";
// often email servers won't allow emails to be sent to
// domains other than their own.  The return path here will
// often lift that restriction so, for instance, you could send
// email to a hotmail account. (hosting provider settings may vary)
// technically bounced email is supposed to go to the return-path email
//$headers .= "Return-path: " . $_POST["email"];

// now we can add the content of the message to a body variable
//$message = $_POST["message"];


$message = "Name: " . $FullName."\r\n <br>";
$message .= "Address: " . $Address_1."\r\n <br>";
$message .= "Address 2: " . $Address_2."\r\n <br>";
$message .= "City: " . $City."\r\n <br>";
$message .= "State: " . $State."\r\n <br>";
$message .= "Zip Code: " . $Zip."\r\n <br>";
$message .= "Phone Number: " . $Phone."\r\n <br>";
$message .= "Email Address: " . $Email."\r\n <br><br>";

$message .= "Tub Type: " . $Type."\r\n <br>";
$message .= "Tub Size: " . $Size."\r\n <br>";
$message .= "Seating: " . $Seating."\r\n <br>";
$message .= "Tub Cabinet: " . $Cabinet."\r\n <br>";
$message .= "Tub Shell: " . $Shell."\r\n <br>";
$message .= "Jet Type: " . $Jet."\r\n <br>";
$message .= "Bubbles: " . $Bubbles."\r\n <br>";
$message .= "Insulation: " . $Insulation."\r\n <br>";
$message .= "Cover: " . $Cover."\r\n <br>";
$message .= "Heater: " . $Heater."\r\n <br>";
$message .= "Filtration: " . $Filtration."\r\n <br>";
$message .= "Purification: " . $Purification."\r\n <br>";
$message .= "Feature: " . $Feature."\r\n <br>";
$message .= "MsDToken Code1: " . $MsDToken."\r\n <br>";


// once the variables have been defined, they can be included
// in the mail function call which will send you an email
//mail($sendTo_1, $subject, $message, $headers);
//mail($sendTo_2, $subject, $message, $headers);


$sendEmail = $sendTo_1 . ", ";
$sendEmail .= $Email;
mail($sendEmail, $subject, $message, $headers);
/***************************************************\
// TALK TO DATABASE CODE STUFF
//
//$query = "INSERT INTO `users` 
//         ( `first_name`,  `last_name`,  `email`,  `first_choice`)
//         VALUES
//         ('$first_name', '$last_name', '$contact_email', '$contact_message')";

 //session_destroy();
\***************************************************/
?>