<?php
  session_start();

  include "../backend/connect_db.php";

  if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    include "../backend/find_user_info.php";
  }

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
            <li class="nav-item active dropdown pl-sm-4">
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
                <a class="dropdown-item active" href="./schedule.php"
                  >Schedule</a
                >
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
      class="home_bg_cover d-flex align-items-center min_vh_unset position-relative w-100"
    >
      <div class="container h-100 mt-10 mb-5">
        <div class="row align-items-center">
          <div class="col-12 col-sm-6">
            <h1 class="font-weight-bolder font_muli clear_line_height">
              KUET Radio
            </h1>
            <p class="font_muli_light font-weight-lighter">
              A virtual platform which relates every other curricular and extracurricular side of KUET. Also broadcasts talks of each particular person related to KUET to the worldwide people.
            </p>
          </div>
          <div class="col-12 col-sm-4 col-md-3 offset-sm-1 offset-md-2">
            <button
              class="btn btn-sm btn-block bg-primary text-white"
              data-toggle="modal"
              data-target="#request_a_song_modal"
            >
              Request A Song
            </button>
          </div>
        </div>

        <div class="row">
          <div
            class="col-12 col-sm-7 col-md-8 col-lg-9 d-flex align-self-center mt-4 mt-sm-0"
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

    <!-- comment_modal starts -->
    <?php
      include './components/comment_modal.php';
    ?>
    <!-- comment_modal ends -->

    <div class="container my-5">
      <div class="row pr-sm-0 pr-md-3">
        <div class="col-12 mt-5 mb-4">
          <h1 class="text_dark">Scheduled Shows</h1>
        </div>
        <?php
          $show_index = 1;

          while($show = mysqli_fetch_assoc($scheduled_shows)) {
            $show_id = $show['show_id'];
            $find_show_rjs_query = "SELECT * FROM scheduled_shows_rjs WHERE show_id='$show_id'";
            $scheduled_shows_rjs = mysqli_query($connection, $find_show_rjs_query);

            ?>
              <div class="col-12 <?php if($show_index % 5 !== 1) { echo "col-sm-6"; } ?>">
                <div
                  class="media box_shadow_basic schedule_card_bg_<?php echo ($show_index % 3) + 1; ?> p-4 card_border_radius mb-5"
                >
                  <div class="media-body text-white">
                    <h1 class="mb-1"><strong><?php echo $show['show_name']; ?></strong></h1>
                    <h6 class="my-3">
                      <?php
                        $rj_index = 1;

                        while($show_rj = mysqli_fetch_assoc($scheduled_shows_rjs)) {
                          $show_rj_id = $show_rj['rj_id'];
                          $find_show_rj_info = "SELECT * FROM users WHERE id = '$show_rj_id'";
                          $show_rj_name = mysqli_fetch_assoc(mysqli_query($connection, $find_show_rj_info))['first_name'];
                          
                          if($rj_index == 1) {
                            echo 'RJ ' . $show_rj_name;
                          }else {
                            echo ', RJ ' . $show_rj_name;
                          }

                          $rj_index++;
                        }
                      ?>
                    </h6>
                    <span class="badge badge-info py-2 px-4 mt-3 text-white">
                      <span class="fa fa-clock-o"></span>
                      <?php echo $show['show_time'] . ', ' . $show['show_day']; ?>
                    </span>
                  </div>
                </div>
              </div>
            <?php
            $show_index++;
          }
        ?>
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
