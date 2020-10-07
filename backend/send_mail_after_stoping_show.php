<?php

  include "../backend/find_user_info.php";

  $rj_name = $user['first_name'] . ' ' . $user['last_name'];
  $rj_batch = $user['batch_no'];
  $rj_roll = $user['roll'];
  $rj_contact = $user['contact'];
  
  $query = "SELECT * FROM users WHERE (designation = 'President' OR  designation = 'Vice President' OR  designation = 'General Secretary' OR  designation = 'Production Manager') AND isInWorkingCommittee = '1'";
  $mail_receivers = mysqli_query($connection, $query);

  $mail_from = "kuetradioofficial@gmail.com";

  $headers = "From: $mail_from";
  $headers .= "Reply-to: $mail_from";

  $mail_subject = "[kuetradio.org (Show Stopped)] $rj_name stopped the show";
  $mail_body = "Dear Authority,\n\nA show named $show_name has been stopped by\nRJ $rj_name\n#$rj_roll, $rj_batch\nContact: $rj_contact \n\nfrom \nKUET Radio Website \nkuetadio.org";

  while($mail_receiver = mysqli_fetch_assoc($mail_receivers)) {
    $mail_to = $mail_receiver['email'];

    mail($mail_to, $mail_subject, $mail_body, $headers);

  }
?>
