<?php
  session_start();
  
  include "../backend/connect_db.php";

  if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    include "../backend/find_user_info.php";
  }
  
  include '../backend/find_team_members.php';
  include '../backend/find_current_show.php';
  include '../backend/find_current_guests.php';
  include '../backend/find_current_rjs.php';
  include "../backend/find_servers.php";

  if(mysqli_num_rows($running_show)) {
    $running_show_info = mysqli_fetch_assoc($running_show);
    $rj_list = [];

    while($rj = mysqli_fetch_assoc($running_show_rjs)) {
      array_push($rj_list, $rj['user_id']);
    }
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
            <li class="nav-item active pl-sm-4">
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
            <?php
              if(isset($_SESSION['id'])) {
                include './components/user_dropdown.php';
              } else {
            ?>
              <li class="nav-item pl-sm-4">
                <a
                  href="./sign_in_or_up.php"
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

    <div
      class="home_bg_cover d-flex align-items-center min_vh_75 position-relative w-100"
    >
      <div class="container h-100">
        <div class="row">
          <div class="col-12 text-center">
            <h1 id="playing_title"
              class="display-4 font-weight-lighter font_muli_light clear_line_height"
            >
              <?php
                if(isset($running_show_info)) {
                  echo $running_show_info['name'];
                } else {
                  echo 'KUET Radio';
                }
              ?> <br />
            </h1>
            <h1 class="font-weight-lighter font_muli_light clear_line_height"
            >
              <small id="playing_author"></small>
            </h1>
          </div>
        </div>
        <div class="row">
          <div
            class="col-12 d-flex align-items-center justify-content-center mt-3"
          >
            <div
              class="rounded-circle play-pause-btn play-pause-btn--large align-items-center justify-content-center text-white"
              id="js-play-pause-btn"
            >
              <span class="fa fa-2x fa-play"></span>
            </div>
          </div>
        </div>
      </div>

      <div class="position-absolute bottom_0 w-100 mb-3">
        <div class="container">
          <div class="row">
            <div
              class="col-12 col-sm-7 col-md-8 col-lg-9 d-none d-sm-flex align-self-center"
            >
              <div class="text-left">
                <a class="pr-4 text-white" href="https://www.linkedin.com/company/kuet-radio/" target="_blank"><i class="fa fa-lg fa-linkedin"></i
                ></a>
                <a class="pr-4 text-white" href="https://www.youtube.com/channel/UCiaIVorC078th3HqpiW8gtg" target="_blank"><i class="fa fa-lg fa-youtube-play"></i
                ></a>
                <a
                  class="pr-4 text-white"
                  href="https://www.facebook.com/kuetradio" target="_blank"><i class="fa fa-lg fa-facebook"></i
                ></a>
                <a class="text-white" href="https://soundcloud.com/user-368653981" target="_blank"><i class="fa fa-lg fa-soundcloud"></i
                ></a>
                <a class="text-white" href="https://instagram.com/_kuet_radio?igshid=j16g7jsrzoon" target="_blank"><i class="fa fa-lg fa-instagram"></i
                ></a>
              </div>
            </div>
            <div class="col-10 col-sm-4 col-md-3 col-lg-2">
              <button
                class="btn btn-sm btn-block bg-primary text-white"
                data-toggle="modal"
                data-target="#request_a_song_modal"
              >
                Request A Song
              </button>
            </div>
            <div
              class="col-2 col-sm-1 d-flex align-items-center justify-content-end"
            >
              <a href="#comment_form"
                ><span class="fa fa-2x fa-comments-o cursor_pointer"></span
              ></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- request_a_song_modal starts -->
    <?php
      include './components/song_request_modal.php';
    ?>
    <!-- request_a_song_modal ends -->

    <div class="container my-5">
      <div class="row">
        <?php
          if(!isset($running_show_info)) {
            ?>
              <div class="col-12 alert alert-danger" role="alert">
                No shows are running.
              </div>
            <?php
          } else {
            ?>
              <div class="col-12 col-sm-6">
                <div class="row pr-sm-0 pr-md-3">
                  <div class="col-12 mt-5 mb-4">
                    <h1 class="text_dark">Guests</h1>
                  </div>
                  <?php
                    while($guest = mysqli_fetch_assoc($running_show_guests)) {
                      ?>
                        <div class="col-12">
                          <div class="media box_shadow_basic p-3 card_border_radius mb-4">
                            <img
                              src="../guest_info/dp/<?php echo $guest['dp_name'] ?>"
                              class="align-self-center mr-3 card_img_thumbnail rounded-circle"
                            />
                            <div class="media-body text_dark">
                              <h5><?php echo $guest['name'] ?></h5>
                              <h6 class="text-black-50"><?php echo $guest['department'] ?></h6>
                              <h6 class="text-uppercase text-black-50"><?php echo $guest['batch'] ?></h6>
                              <h6 class="text-uppercase text-black-50"><?php echo $guest['other_description'] ?></h6>
                            </div>
                          </div>
                        </div>
                      <?php
                    }
                  ?>
                </div>
              </div>

              <div class="col-12 col-sm-6">
                <div class="row pl-sm-0 pl-md-3">
                  <div class="col-12 mt-5 mb-4">
                    <h1 class="text_dark">RJs</h1>
                  </div>
                  <?php
                    while($member = mysqli_fetch_assoc($team_members)) {
                      if(isset($rj_list) && in_array($member['id'], $rj_list)) {
                        ?>
                          <div class="col-12">
                            <div class="media box_shadow_basic p-3 card_border_radius mb-4">
                              <img
                                src="../user_info/dp/<?php echo $member['dp_name'] ?>"
                                class="align-self-center mr-3 card_img_thumbnail rounded-circle"
                              />
                              <div class="media-body text_dark">
                                <h5><?php echo $member['first_name'] . ' ' . $member['last_name'] ?></h5>
                                <h6 class="text-black-50"><?php echo $member['designation'] ?></h6>
                                <h6 class="text-uppercase text-primary"><?php echo $member['authority_level'] ?></h6>
                              </div>
                            </div>
                          </div>
                        <?php
                      }
                    }
                  ?>
                </div>
              </div>
            <?php
          }
        ?>
      </div>
    </div>

    <div class="container my-5" id="comment_form">
      <div class="row">
        <div class="col-12 mb-4">
          <h1 class="text_dark">Leave a Comment</h1>
        </div>
        <div class="col-12 col-sm-9">
          <form method="POST" action="../backend/create_comment.php">
            <div class="form-row">
              <div class="col-12 col-sm-6 mb-3">
                <label class="text_dark" for="your_name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="your_name"
                  aria-describedby="yourNameHelp"
                  name="commentator_name"
                  placeholder="Enter your name"
                  required
                />
                <small id="yourNameHelp" class="form-text text-muted"
                  ></small
                >
              </div>
              <div class="col-12 col-sm-6 mb-3">
                <label class="text_dark" for="your_batch">Batch</label>
                <input
                  type="text"
                  class="form-control"
                  id="your_batch"
                  name="commentator_batch"  
                  aria-describedby="yourBatchHelp"
                  placeholder="Enter your batch"
                />
                <small id="yourBatchHelp" class="form-text text-muted"
                  ></small
                >
              </div>
            </div>
            <div class="form-group">
              <label class="text_dark" for="your_comment">Comment</label>
              <textarea
                class="form-control"
                id="your_comment"
                name="comment"
                rows="4"
                required
              ></textarea>
              <small id="your_comment" class="form-text text-muted"
                ></small
              >
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Comment</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php
      include './components/footer.php';
    ?>

    <audio id="theme-song-player">
      <source src="../audios/KUET_RADIO_Intro_song_short.m4a" />
    </audio>

    <?php
      if(mysqli_num_rows($running_show)) {
        ?>
          <audio id="main-but-hidden-radio-player">
            <?php
              while($server = mysqli_fetch_assoc($servers)) {
                ?>
                  <source src="http://<?php echo $server['ip'] ?>:<?php echo $server['port'] ?>/;stream" />
                <?php
              }
            ?>
          </audio>
        <?php
      } else {
        ?>
          <audio id="song-player-1"></audio>
          <audio id="song-player-2"></audio>
        <?php
      }
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
