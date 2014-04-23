<?php

class HtEmail
{

  public $to_emails;

  public function __construct()
  {
    require $_SERVER['DOCUMENT_ROOT'] . '/classes/PHPMailer2Autoload.php';

    $this->toEmails = array('callcenter@thermospas.com');

  }

  function sendSubmission($submission, $source, $lead = false)
  {
    // Built email template
    $html = "<style>body { font-family: arial; } table { border-collapse: collapse; } th, td { border: 1px solid #000; padding: 4px 8px; text-align: left; font-size: 12px;  }</style>";
    $html .= "<h1>HT Form Submission</h1>";
    $html .= "<h2>Source: $source</h2>";
    date_default_timezone_set('America/New_York');
    $date_time = date("F j, Y, g:i a");
    $html .= "<h2>Date & Time: $date_time (ET)</h2>";
    $html .= "<table><tr><th>Key</th><th>Value</th></tr>";
    foreach($submission as $k => $v) { $html .= "<tr><td>$k</td><td>$v</td></tr>"; }
    $html .= "</table>";

    // Add lead information if exists
    if($lead) {
      $html .= "<h2>Lead Information</h2>";
      $html .= "<table><tr><th>Key</th><th>Value</th></tr>";
      foreach($lead as $k => $v) { $html .= "<tr><td>$k</td><td>$v</td></tr>"; }
      $html .= "</table>";
    }

    $mail = new PHPMailer2;
    $mail->From = 'donotreply@thermospas.com';
    $mail->FromName = 'Mailer';
    $mail->WordWrap = 50;
    $mail->isHTML(true);
    $mail->Subject = "HT Form: $source";
    $mail->Body = $html;
    foreach($this->toEmails as $toEmail) { $mail->addAddress($toEmail); }
    $mail->send();

  }

}
