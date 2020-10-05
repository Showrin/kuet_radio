<?php

  include "../backend/find_user_info.php";
  include "../backend/find_current_show.php";

  $rj_name = $user['first_name'] . ' ' . $user['last_name'];
  $rj_batch = $user['batch_no'];
  $rj_roll = $user['roll'];
  $rj_contact = $user['contact'];
  
  $query = "SELECT * FROM users WHERE designation = 'President' OR  designation = 'Vice President' OR  designation = 'General Secretary' OR  designation = 'Production Manager'";
  $mail_receivers = mysqli_query($connection, $query);

  $mail_from = "kuetradioofficial@gmail.com";

  $headers = "From: $mail_from";
  $headers .= "Reply-to: $mail_from";

  $mail_subject = "[kuetradio.org (Show Started)] $rj_name started show";
  $mail_body = "Dear Authority,\n\nA show named <b>$show_name</b> has been started by\n<b>RJ $rj_name</b>\n$rj_roll\n$rj_batch\n$rj_contact \n\nfrom \nKUET Radio Website \nkuetadio.org";

  while($mail_receiver = mysqli_fetch_assoc($mail_receivers)) {
    $mail_to = $mail_receiver['email'];

    mail($mail_to, $mail_subject, $mail_body, $headers);

  }
?>
