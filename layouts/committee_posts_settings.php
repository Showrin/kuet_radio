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
                  <a class="dropdown-item active" href="./committee_posts_settings.php"
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
        <div class="col-12 col-sm-9">
          <h1 class="text_dark mt-5 mb-4">Committee Posts Settings</h1>

          <form method="POST" action="../backend/check_posts_to_show.php">
            <div class="form-row">
              <div class="col-12">
                <label class="text_dark">Present Posts</label>
              </div>
              <?php
                include "../backend/show_all_committee_posts.php";
                while($row = mysqli_fetch_assoc($committee_posts_result)) {
              ?>
                <div class="col-3">
                  <div class="form-group form-check text_dark">
                    <input type="checkbox" class="form-check-input" id="<?php echo $row['post_id']; ?>" name='committee_posts[]' value="<?php echo $row['post_id']; ?>" <?php if($row['isChecked'] === '1'){ echo 'checked'; } ?> />
                    <label class="form-check-label text-capitalize" for="<?php echo $row['post_id']; ?>"><?php echo $row['post_name']; ?></label>
                  </div>
                </div>
              <?php
                }
              ?>
            </div>

            <div class="form-row">
              <div class="col-12 mb-3">
                <button type="submit" class="btn btn-success">
                  Update Settings
                </button>
              </div>
            </div>
          </form>
          
          <form class="mt-5" method="POST" action="../backend/add_new_post.php">
            <div class="form-row">
              <div class="col-12 mb-3">
                <label class="text_dark" for="post_name">New Post Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="post_name"
                  aria-describedby="postNameHelp"
                  name="new_post"
                  required
                />
                <small id="postNameHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </div>
            <div class="form-row">
              <div class="col-12 mb-3">
                <button type="submit" class="btn btn-success">
                  Add the Post
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Radio Player Starts -->
    <?php
      include './components/radio_player.php';
    ?>
    <!-- Radio Player Ends -->

    <footer class="footer bg-secondary pt-5 pb-3">
      <div class="container">
        <div class="row">
          <div class="col-4 col-sm-4">
            <h5>Links</h5>
            <ul class="list-unstyled">
              <li><a href="../index.php">Home</a></li>
              <li><a href="./onAir.php">On Air</a></li>
              <li><a href="./schedule.php">Schedule</a></li>
              <li><a href="./team.php">Our Team</a></li>
              <li><a href="./alumni.php">Alumni</a></li>
              <li><a href="./contact.php">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-7 col-sm-4">
            <h5>Our Contacts</h5>
            <i class="fa fa-phone fa-lg pr-2"></i>
            <a href="tel:+852 1234 5678">+852 1234 5678</a><br />
            <i class="fa fa-envelope fa-lg pr-2"></i>
            <a href="mailto:kuetradio01@gmail.com">kuetradio01@gmail.com</a>
          </div>
          <div class="col-12 col-sm-4">
            <h5>Follow Us on</h5>
            <div class="text-left">
              <a class="pr-4 text-white" href="http://google.com/+"
                ><i class="fa fa-lg fa-envelope"></i
              ></a>
              <a class="pr-4 text-white" href="http://www.linkedin.com/in/"
                ><i class="fa fa-lg fa-linkedin"></i
              ></a>
              <a class="pr-4 text-white" href="http://youtube.com/"
                ><i class="fa fa-lg fa-youtube-play"></i
              ></a>
              <a
                class="pr-4 text-white"
                href="http://www.facebook.com/profile.php?id="
                ><i class="fa fa-lg fa-facebook"></i
              ></a>
              <a class="text-white" href="http://twitter.com/"
                ><i class="fa fa-lg fa-twitter"></i
              ></a>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-auto">
            <p class="text-center">
              © Copyright
              <span id="present_copyright_year"></span> KUET Radio | Developed
              By
              <a href="https://www.facebook.com/showrinbarua.hridoy"
                >Showrin Barua</a
              >
            </p>
          </div>
        </div>
      </div>
    </footer>

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
