<?php
  session_start();

  include "../backend/connect_db.php";

  if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    include "../backend/find_user_info.php";
  }

  include "../backend/find_president.php";
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
                <a class="dropdown-item" href="./schedule.php">Schedule</a>
                <a class="dropdown-item" href="./team.php">Our Team</a>
                <a class="dropdown-item" href="./alumni.php">Alumni</a>
                <a class="dropdown-item active" href="./contact.php"
                  >Contact Us</a
                >
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
              Radio broadcasting is transmission by radio waves intended to
              reach a wide audience. Stations can be linked in radio networks to
              broadcast a common radio
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

    <div class="container my-5" id="contact_form">
      <div class="row">
        <?php
        echo $_GET['mail_sent'];
          if(isset($_GET['mail_sent']) && $_GET['mail_sent'] === "true") {
        ?>
            <div class="alert alert-success col-12 mb-5" role="alert">
              Your mail has been sent successfully. Thank You.
            </div>
        <?php
          } else if(isset($_GET['mail_sent']) && $_GET['mail_sent'] === "false") {
        ?>
            <div class="alert alert-danger col-12 mb-5" role="alert">
              Sorry! Your mail wasn't sent. Please, try again.
            </div>
        <?php
          }
        ?>
        <div class="col-12 mb-4">
          <h1 class="text_dark">Contact Us</h1>
        </div>
        <div class="col-12 col-sm-12">
          <form class="row" method="POST" action="../backend/send_mail.php">
            <div class="form-group col-12 col-sm-3">
              <label class="text_dark" for="your_name">Name</label>
              <input
                type="text"
                class="form-control"
                id="your_name"
                aria-describedby="yourNameHelp"
                placeholder="Enter your name"
                name="senderName"
                required
              />
              <small id="yourNameHelp" class="form-text text-muted"
                >Please fill up this field</small
              >
            </div>
            <div class="form-group col-12 col-sm-3">
              <label class="text_dark" for="your_email">Email</label>
              <input
                type="email"
                class="form-control"
                id="your_email"
                aria-describedby="yourEmailHelp"
                placeholder="Enter your email"
                name="senderEmail"
                required
              />
              <small id="yourEmailHelp" class="form-text text-muted"
                >Please fill up this field</small
              >
            </div>
            <div class="form-group col-12 col-sm-6">
              <label class="text_dark" for="your_subject">Subject</label>
              <input
                type="text"
                class="form-control"
                id="your_subject"
                aria-describedby="yourSubjectHelp"
                placeholder="Enter your subject"
                name="emailSubject"
                required
              />
              <small id="yourSubjectHelp" class="form-text text-muted"
                >Please fill up this field</small
              >
            </div>
            <div class="form-group col-12">
              <label class="text_dark" for="your_message">Message</label>
              <textarea
                class="form-control"
                id="your_message"
                name="emailBody"
                rows="4"
                required
              ></textarea>
              <small id="yourNameHelp" class="form-text text-muted"
                >Please fill up this field</small
              >
            </div>
            <div class="form-group col-12">
              <button type="submit" class="btn btn-success">Send</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-12 text_dark">
          Or Contact Us via
          <span class="text-left">
            <a class="pl-4" href="https://www.facebook.com/kuetradio" target="_blank"
              ><i class="fa fa-lg fa-facebook"></i
            ></a>
            <a class="pl-4" href="mailto:kuetradioofficial@gmail.com"
              ><i
                class="fa fa-lg fa-envelope"
                data-toggle="tooltip"
                data-placement="top"
                title="kuetradioofficial@gmail.com"
              ></i
            ></a>
            <?php
              if(isset($president['contact'])) {
                ?><a class="pl-4" href="tel:<?php echo $president['contact'] ?>"
                  ><i
                    class="fa fa-lg fa-phone"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="<?php echo $president['contact'] ?>"
                  ></i
                ></a>
                <?php
              }
            ?>
          </span>
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
