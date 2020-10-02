<?php
  include "../backend/is_logged_in_check.php";

  $id = $_SESSION['id'];

  include "../backend/connect_db.php";
  include "../backend/find_user_info.php";
  include '../backend/find_team_members.php';
  include '../backend/find_current_show.php';
  include '../backend/find_shows.php';
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
                  <a class="dropdown-item active" href="./schedule_settings.php"
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
                <label class="text_dark" for="your_comment_name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="your_comment_name"
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
            <button type="submit" class="btn btn-success">
              Comment
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- comment_modal ends -->

    <div class="container my-5">
      <div class="row">
        <div class="col-12">
          <h1 class="text_dark mt-5 mb-4">Existing Shows</h1>
          <div class="row">
            <?php
              while($show = mysqli_fetch_assoc($scheduled_shows)) {
                $show_id = $show['show_id'];
                $find_show_rjs_query = "SELECT * FROM scheduled_shows_rjs WHERE show_id='$show_id'";
                $scheduled_shows_rjs = mysqli_query($connection, $find_show_rjs_query);
                ?>
                  <div class="col-12 col-sm-4">
                    <div class="media song-card box_shadow_basic p-3 card_border_radius">
                      <div class="media-body text_dark h-100">
                        <div class="row h-100">
                          <div class="col-12 d-flex flex-wrap h-100">
                            <h5 class="w-100">
                              <?php echo $show['show_name']; ?>
                            </h5>
                            <span class="badge badge-info p-2 my-1 text-white">
                              <span class="fa fa-clock-o"></span>
                              <?php echo $show['show_time'] . ', ' . $show['show_day']; ?>
                            </span>
                            <div class="text-dark w-100 mb-3">
                              <strong>RJ: </strong>
                              <?php
                                $index = 1;

                                while($show_rj = mysqli_fetch_assoc($scheduled_shows_rjs)) {
                                  $show_rj_id = $show_rj['rj_id'];
                                  $find_show_rj_info = "SELECT * FROM users WHERE id = '$show_rj_id'";
                                  $show_rj_name = mysqli_fetch_assoc(mysqli_query($connection, $find_show_rj_info))['first_name'];
                                  
                                  if($index == 1) {
                                    echo ' ' . $show_rj_name;
                                  }else {
                                    echo ', ' . $show_rj_name;
                                  }

                                  $index++;
                                }
                              ?>
                            </div>
                            <a
                              href="../backend/delete_scheduled_show.php?show_id=<?php echo $show_id; ?>"
                              class="btn btn-sm btn-block bg-danger text-white mt-3 align-self-end"
                              >Delete</a
                            >
                          </div>
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
      <div class="row">
        <div class="col-12 col-sm-9">
          <h1 class="text_dark mt-5 mb-4">Add New Show</h1>

          <form id="start_show_form" method="POST" action="../backend/create_show.php">
            <div class="form-row">
              <div class="col-12 mb-3">
                <label class="text_dark" for="show_name">Show Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="show_name"
                  name="show_name"
                  aria-describedby="showNameHelp"
                  required
                />
                <small id="showNameHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </div>

            <div class="form-row">
              <div class="col-12 col-sm-6 mb-3">
                <label class="text_dark" for="show_day">Show Day</label>
                <input
                  type="text"
                  class="form-control"
                  id="show_day"
                  name="show_day"
                  aria-describedby="showDayHelp"
                  required
                />
                <small id="showDayHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>

              <div class="col-12 col-sm-6 mb-3">
                <label class="text_dark" for="show_time">Show Time</label>
                <input
                  type="text"
                  class="form-control"
                  id="show_time"
                  name="show_time"
                  aria-describedby="showTimeHelp"
                  required
                />
                <small id="showTimeHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </div>

            <div class="form-row">
              <div class="col-12">
                <label class="text_dark">RJs</label>
              </div>
              <?php
                while($member = mysqli_fetch_assoc($team_members)) {
                  ?>
                    <div class="col-3">
                      <div class="form-group form-check text_dark">
                        <input type="checkbox" class="form-check-input" id='rj-<?php echo $member['id'] ?>' name='rjs[]' value="<?php echo $member['id'] ?>" />
                        <label class="form-check-label" for="rj-<?php echo $member['id'] ?>"><?php echo $member['first_name'] . ' ' . $member['last_name'] ?></label>
                      </div>
                    </div>
                  <?php
                }
              ?>
            </div>
            <div class="form-row">
              <div class="col-12 mb-3">
                <button type="submit" class="btn btn-success">
                  Save Changes
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
      startMusicPlayer("./songs/");
    </script>
    <!-- endbuild -->
  </body>
</html>
