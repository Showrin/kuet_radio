<?php
  header('Access-Control-Allow-Origin: https://kuet-radio-server.herokuapp.com', false);
  session_start();

  if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    include "./backend/connect_db.php";
    include "./backend/find_user_info.php";
  }
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
    <!-- build:css css/main.css -->
    <link
      rel="stylesheet"
      href="node_modules/font-awesome/css/font-awesome.css"
    />
    <link rel="stylesheet" href="css/styles.css" />
    <!-- endbuild -->

    <title>KUET Radio (Voice of KUETians)</title>
  </head>

  <body class="home_bg_cover pb-5 mb-3 pb-sm-0 mb-sm-0 d-flex">
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

        <a class="navbar-brand mr-auto" href="./"
          ><img src="./img/logo.png" width="90"
        /></a>

        <div class="collapse navbar-collapse" id="Navbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a href="./" class="nav-link">Home</a>
            </li>
            <li class="nav-item pl-sm-4">
              <a href="./layouts/onAir.php" class="nav-link"> On Air</a>
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
                <a class="dropdown-item" href="./layouts/schedule.php">Schedule</a>
                <a class="dropdown-item" href="./layouts/team.php">Our Team</a>
                <a class="dropdown-item" href="./layouts/alumni.php">Alumni</a>
                <a class="dropdown-item" href="./layouts/contact.php">Contact Us</a>
              </div>
            </li>
            <?php
              if(isset($_SESSION['id'])) {
            ?>
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
                    src="./user_info/dp/<?php echo $user['dp_name']; ?>"
                    class="mr-2 card_img_thumbnail card_img_thumbnail--small rounded-circle"
                  />
                  <?php echo $user['first_name']; ?>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-left"
                  aria-labelledby="memberOptions"
                  id="memberOptionsDropdownArea"
                >
                  <a class="dropdown-item" href="./layouts/profile.php"
                    >Profile</a
                  >
                  <?php
                    if(strtolower($user['authority_level']) === 'admin' || strtolower($user['authority_level']) === 'moderator' || strtolower($user['authority_level']) === 'editor') {
                  ?>
                    <a class="dropdown-item" href="./layouts/start_a_show.php"
                      >Start a Show</a
                    >
                    <a class="dropdown-item" href="./layouts/comments.php">Comments</a>
                    <a class="dropdown-item" href="./layouts/running_show_settings.php"
                      >Running Show Settings</a
                    >
                  <?php
                    }
                  ?>
                  <?php
                    if(strtolower($user['authority_level']) === 'admin' || strtolower($user['authority_level']) === 'moderator') {
                  ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./layouts/song_requests.php"
                      >Song Requests</a
                    >
                  <?php
                    }
                  ?>
                  <?php
                    if(strtolower($user['authority_level']) === 'admin') {
                  ?>
                    <a class="dropdown-item" href="./layouts/account_requests.php"
                      >Account Requests</a
                    >
                  <?php
                    }
                  ?>
                  <?php
                    if(strtolower($user['authority_level']) === 'admin' || strtolower($user['authority_level']) === 'moderator') {
                  ?>
                    <a class="dropdown-item" href="./layouts/playlist_settings.php"
                      >Playlist Settings</a
                    >
                  <?php
                    }
                  ?>
                  <?php
                    if(strtolower($user['authority_level']) === 'admin' || strtolower($user['authority_level']) === 'moderator') {
                  ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./layouts/schedule_settings.php"
                      >Schedule Settings</a
                    >
                  <?php
                    }
                  ?>
                  <?php
                    if(strtolower($user['authority_level']) === 'admin') {
                  ?>
                    <a class="dropdown-item" href="./layouts/server_settings.php"
                      >Server Settings</a
                    >
                    <a class="dropdown-item" href="./layouts/member_management.php"
                      >Member Management</a
                    >
                    <a class="dropdown-item" href="./layouts/committee_posts_settings.php"
                      >Committee Posts Settings</a
                    >
                  <?php
                    }
                  ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./backend/logout.php">Logout</a>
                </div>
              </li>
            <?php
              } else {
            ?>
              <li class="nav-item pl-sm-4">
                <a
                  href="./layouts/sign_in_or_up.php"
                  class="btn btn-sm btn-outline-primary my-3 my-sm-1 px-4"
                >
                  Sign In
                </a>
              </li>
            <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-5 pt-5 mt-sm-0 pt-sm-0 align-self-center">
      <div class="row">
        <div class="offset-xl-3 offset-md-2 offset-0 col-12 col-xl-6 col-md-8">
          <h1
            class="display-4 font-weight-lighter font_muli_light clear_line_height text-center mt-5"
          >
            Radio To <br />
            Spread KUETians' <br />
            Voice
          </h1>
        </div>
      </div>
      <div class="row my-3 my-sm-2">
        <div class="offset-0 offset-xl-4 offset-sm-2 col-12 col-sm-4 col-xl-2">
          <button
            class="btn btn-block bg-primary text-white"
            data-toggle="modal"
            data-target="#request_a_song_modal"
          >
            Request A Song
          </button>
        </div>
        <div class="col-12 col-sm-4 col-xl-2 mt-3 mt-sm-0">
          <a
            href="./layouts/schedule.php"
            class="btn btn-block btn-outline-primary text-white"
            >Schedule</a
          >
        </div>
      </div>
      <div class="row my-5">
        <div
          class="offset-0 offset-sm-3 col-12 col-sm-6 d-flex align-self-center justify-content-center"
        >
          <div class="text-center">
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
    </div>

    <!-- request_a_song_modal starts -->
    <div id="request_a_song_modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="content">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text_dark">Request a Song</h4>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              &times;
            </button>
          </div>
          <div class="modal-body text-secondary">
            <form>
              <div class="form-group">
                <label class="text_dark" for="song_name">Song Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="song_name"
                  aria-describedby="songNameHelp"
                  placeholder="Enter song name"
                />
                <small id="songNameHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
              <div class="form-group">
                <label class="text_dark" for="singer_name"
                  >Singer Name <small><em>(Optional)</em></small></label
                >
                <input
                  type="text"
                  class="form-control"
                  id="singer_name"
                  aria-describedby="singerNameHelp"
                  placeholder="Enter singer name"
                />
                <small id="singerNameHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
              <div class="form-group">
                <label class="text_dark" for="song_url"
                  >Song Link/URL <small><em>(Optional)</em></small></label
                >
                <input
                  type="text"
                  class="form-control"
                  id="song_url"
                  aria-describedby="songURLHelp"
                  placeholder="Enter song URL"
                />
                <small id="songURLHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="submit" class="btn btn-success">Send Request</button>
          </div>
        </div>
      </div>
    </div>
    <!-- request_a_song_modal ends -->

    <!-- comment_modal starts -->
    <div id="comment_modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="content">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text_dark">Leave a Comment</h4>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              &times;
            </button>
          </div>
          <div class="modal-body text-secondary">
            <form>
              <div class="form-group">
                <label class="text_dark" for="your_name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="your_name"
                  aria-describedby="yourNameHelp"
                  placeholder="Enter your name"
                />
                <small id="yourNameHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
              <div class="form-group">
                <label class="text_dark" for="your_comment">Comment</label>
                <textarea
                  class="form-control"
                  id="your_comment"
                  name="feedback"
                  rows="4"
                ></textarea>
                <small id="yourNameHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="submit" class="btn btn-success">Comment</button>
          </div>
        </div>
      </div>
    </div>
    <!-- comment_modal ends -->

    <!-- Radio Player Starts -->
    <div class="radio-player">
      <div class="container">
        <div class="row">
          <div class="col-2 d-none d-sm-flex align-items-center">
            <img
              src="./img/logo.png"
              alt="LOGO"
              class="img-fluid"
              width="100"
            />
          </div>
          <div
            class="col pr-0 pl-sm-0 d-flex align-items-center justify-content-start"
          >
            <div
              class="rounded-circle play-pause-btn align-items-center justify-content-center text-white"
              id="js-play-pause-btn"
            >
              <span class="fa fa-play"></span>
            </div>
          </div>
          <div
            class="col-8 col-sm-7 text-white d-flex justify-content-center flex-column"
          >
            <h5 class="mb-0 mb-sm-2">
              <span>KUET Radio</span>
              <small class="d-block d-sm-inline font-weight-normal my-2 my-sm-0"
                >(Beta Test)</small
              >
            </h5>
            <h6 class="mb-0 d-none d-sm-block font_muli_light">
              Guest: ABCDEF & MNOPQR
            </h6>
          </div>
          <div class="col-2 d-flex align-items-center justify-content-end">
            <span
              class="fa fa-2x fa-comments-o cursor_pointer"
              data-toggle="modal"
              data-target="#comment_modal"
            ></span>
          </div>
        </div>
      </div>
    </div>

    <audio id="theme-song-player">
      <source src="./audios/KUET_RADIO_Intro_song_short.m4a" />
    </audio>

    <audio id="main-but-hidden-radio-player">
      <source src="http://95.154.196.33:27878/;stream" />
      <source src="http://109.169.23.22:26954/;stream" />
    </audio>
    <!-- Radio Player Ends -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <!-- build:js js/main.js -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/song_player_controller.js"></script>
    <script>
      var user = <?php echo json_encode($user); ?>;
      console.log(user);
      songPlayer();
    </script>
    <!-- endbuild -->
  </body>
</html>
