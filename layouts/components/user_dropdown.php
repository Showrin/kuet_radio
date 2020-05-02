
<li class="nav-item dropdown pl-sm-4">
  <a
  class="nav-link dropdown-toggle"
  href="#"
  id="memberOptions"
  role="button"
  data-toggle="dropdown"
  aria-haspopup="true"
  aria-expanded="false"
  >
  <img
      src="../user_info/dp/<?php echo $user['dp_name']; ?>"
      class="mr-2 card_img_thumbnail card_img_thumbnail--small rounded-circle"
  />
  <?php echo $user['first_name']; ?>
  </a>
  <div
  class="dropdown-menu dropdown-menu-left"
  aria-labelledby="memberOptions"
  id="memberOptionsDropdownArea"
  >
  <a class="dropdown-item" href="./profile.php"
      >Profile</a
  >
  <?php
      if(strtolower($user['authority_level']) === 'admin' || strtolower($user['authority_level']) === 'moderator' || strtolower($user['authority_level']) === 'editor') {
  ?>
      <a class="dropdown-item" href="./start_a_show.php"
      >Start a Show</a
      >
      <a class="dropdown-item" href="./comments.php">Comments</a>
      <a class="dropdown-item" href="./running_show_settings.php"
      >Running Show Settings</a
      >
  <?php
      }
  ?>
  <?php
      if(strtolower($user['authority_level']) === 'admin' || strtolower($user['authority_level']) === 'moderator') {
  ?>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="./song_requests.php"
      >Song Requests</a
      >
  <?php
      }
  ?>
  <?php
      if(strtolower($user['authority_level']) === 'admin') {
  ?>
      <a class="dropdown-item" href="./account_requests.php"
      >Account Requests</a
      >
  <?php
      }
  ?>
  <?php
      if(strtolower($user['authority_level']) === 'admin' || strtolower($user['authority_level']) === 'moderator') {
  ?>
      <a class="dropdown-item" href="./playlist_settings.php"
      >Playlist Settings</a
      >
  <?php
      }
  ?>
  <?php
      if(strtolower($user['authority_level']) === 'admin' || strtolower($user['authority_level']) === 'moderator') {
  ?>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="./schedule_settings.php"
      >Schedule Settings</a
      >
  <?php
      }
  ?>
  <?php
      if(strtolower($user['authority_level']) === 'admin') {
  ?>
      <a class="dropdown-item" href="./server_settings.php"
      >Server Settings</a
      >
      <a class="dropdown-item" href="./member_management.php"
      >Member Management</a
      >
      <a class="dropdown-item" href="./committee_posts_settings.php"
      >Committee Posts Settings</a
      >
  <?php
      }
  ?>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="../backend/logout.php">Logout</a>
  </div>
</li>