<?php

  $senderName = $_POST['senderName'];
  $senderEmail = $_POST['senderEmail'];
  $cell_no = $_POST['cell_no'];
  $emailSubject = $_POST['emailSubject'];
  $emailBody = $_POST['emailBody'];

  $mail_to = "kuetradioofficial@gmail.com";
  $mail_from = $senderEmail;

  $headers = "From: $mail_from";
  $headers .= "Reply-to: $mail_from";

  $mail_subject = "[kuetradio.org (Contact)] $emailSubject";
  $mail_body = "$emailBody \n \nfrom \n$senderName \n$senderEmail \nContact: $cell_no";

  if($senderName != '' && $senderEmail != '' && $cell_no != '' && $emailSubject != '' && $emailBody != ''){
    if (mail($mail_to, $mail_subject, $mail_body, $headers)) {
      $mail_sent_successfully = "true";
    } else {
      $mail_sent_successfully = "false";
    }
  } else {
    $mail_sent_successfully = "false";
    echo $mail_sent_successfully;
  }
  
  header("Location: " . $_SERVER['HTTP_REFERER'] . "?mail_sent=$mail_sent_successfully");

?>
