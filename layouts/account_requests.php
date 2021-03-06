<?php
  include "../backend/is_logged_in_check.php";

  $id = $_SESSION['id'];

  include "../backend/connect_db.php";
  include "../backend/find_user_info.php";
  include '../backend/find_current_show.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <!-- Bootstrap CSS -->
    <!-- build:css ../css/main.css -->
    <link
      rel="stylesheet"
      href="../node_modules/font-awesome/css/font-awesome.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
    <!-- endbuild -->

    <title>KUET Radio (Voice of KUETians)</title>
  </head>

  <body>
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
      <div class="container">
        <button
          class="navbar-toggler pl-0 border-0"
          type="button"
          data-toggle="collapse"
          data-target="#Navbar"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand mr-auto" href="../index.php"
          ><img src="../img/logo.png" width="90"
        /></a>

        <div class="collapse navbar-collapse" id="Navbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="../index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item pl-sm-4">
              <a href="./onAir.php" class="nav-link"> On Air</a>
            </li>
            <li class="nav-item dropdown pl-sm-4">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                More
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown"
              >
                <a class="dropdown-item" href="./schedule.php">Schedule</a>
                <a class="dropdown-item" href="./team.php">Our Team</a>
                <a class="dropdown-item" href="./alumni.php">Alumni</a>
                <a class="dropdown-item" href="./contact.php">Contact Us</a>
              </div>
            </li>
            <li class="nav-item dropdown pl-sm-4">
              <a
                class="nav-link dropdown-toggle active"
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
                  <a class="dropdown-item active" href="./account_requests.php"
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
          </ul>
        </div>
      </div>
    </nav>

    <div
      class="home_bg_cover d-flex align-items-center min_vh_unset position-relative w-100"
    >
      <div class="container h-100 mt-10 mb-5">
        <div class="row align-items-center my-4">
          <div
            class="col-12 col-lg-2 d-flex justify-content-center justify-content-lg-start mb-4 mb-lg-0"
          >
            <img
            src="../user_info/dp/<?php echo $user['dp_name']; ?>"
              class="mr-2 card_img_thumbnail card_img_thumbnail--large rounded-circle"
            />
          </div>
          <div
            class="col-12 col-lg-6 pl-lg-0 text-center text-lg-left mb-4 mb-lg-0"
          >
            <h2 class="font_muli_light"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h2>
            <h5 class="mt-2 mb-3 text-capitalize"><strong><?php echo $user['designation']; ?></strong></h5>
            <h5 class="text-uppercase text-primary"><?php echo $user['authority_level']; ?></h5>
          </div>
          <div class="col-6 col-lg-3 offset-3 offset-lg-0">
            <?php
            if(mysqli_num_rows($running_show)) {
              ?>
                <a
                  href="../backend/delete_running_show.php"
                  class="btn btn-sm btn-block bg-danger text-white"
                  >Stop the Show</a
                >
              <?php
            } else {
              ?>
                <a
                  href="./start_a_show.php"
                  class="btn btn-sm btn-block bg-primary text-white"
                  >Start a Show</a
                >
              <?php
            }
          ?>
          </div>
        </div>
      </div>
    </div>

    <!-- comment_modal starts -->
    <?php
      include './components/comment_modal.php';
    ?>
    <!-- comment_modal ends -->

    <div class="container my-5">
      <div class="row">
        <div class="col-12 col-sm-9 mt-5 mb-4">
          <h1 class="text_dark">Account Requests</h1>
        </div>

        <div class="col-12">
          <?php  
            include "../backend/find_unapproved_user.php";

            if(!mysqli_num_rows($result)) {
              ?>
                <div class="alert alert-warning" role="alert">
                  There is no pending request
                </div>
              <?php
            }

            while($row = mysqli_fetch_assoc($result)) {
              ?>
                <div class="media box_shadow_basic p-3 card_border_radius mb-4">
                  <img
                    src="../user_info/dp/<?php echo $row['dp_name'] ?>"
                    class="align-self-center mr-3 mr-sm-5 card_img_thumbnail rounded-circle"
                  />
                  <div class="media-body text_dark">
                    <div class="row">
                      <div class="col-12 col-sm-9">
                        <h5>
                          <?php echo $row['first_name'] . ' ' . $row['last_name'] ?>
                        </h5>
                        <div class="text-black-50">
                          <?php echo $row['dept_name'] ?>
                        </div>
                        <div class="text-black-50"><?php echo '#' . $row['roll'] . ', Batch ' . $row['batch_no'] ?></div>
                        <div class="text-black-50">Birthday: <?php echo $row['birth_date'] ?></div>
                        <div class="text-black-50">Contact No: <?php echo $row['contact'] ?></div>
                        <div class="text-black-50">Email: <?php echo $row['email'] ?></div>
                      </div>
                      <div class="col-12 col-sm-3 align-self-center mt-3 mt-sm-0">
                        <a
                          href="../backend/approve_user.php?id=<?php echo $row['id'] ?>"
                          class="btn btn-sm btn-block btn-outline-success"
                          >Accept</a
                        >
                        <a
                          href="../backend/delete_user.php?id=<?php echo $row['id'] ?>"
                          class="btn btn-sm btn-block bg-danger text-white"
                          >Delete</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>

    <!-- Radio Player Starts -->
    <?php
      include './components/radio_player.php';
    ?>
    <!-- Radio Player Ends -->

    <?php
      include './components/footer.php';
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <!-- build:js js/main.js -->
    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/axios.min.js"></script>
    <script src="../js/song_player_controller.js"></script>
    <script src="../js/scripts.js"></script>
    <script>
      startMusicPlayer("../songs/");
    </script>
    <!-- endbuild -->
  </body>
</html>
