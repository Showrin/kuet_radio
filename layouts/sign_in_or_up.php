<?php
  session_start();
  
  if(isset($_SESSION['id'])) {
    header("Location:./profile.php");
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
            <li class="nav-item pl-sm-4">
              <a
                href="./sign_in_or_up.php"
                class="btn btn-sm btn-outline-primary my-3 my-sm-1 px-4 active"
              >
                Sign In
              </a>
            </li>
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

    <div class="container my-5">
      <div class="row">
        <?php
          if($_SESSION['sign_up_success_message'] === 'true') {
        ?>
          <div class="col-12 alert alert-success" role="alert">
            Your account has been created successfully and sent for approval. Thank you.
          </div>
        <?php
          }
          $_SESSION['sign_up_success_message'] = '';
        ?>
        <div class="col-12 col-sm-5">
          <h1 class="text_dark mt-5 mb-4">Sign In</h1>

          <form id="login-form">
            <div class="form-group">
              <label class="text_dark" for="your_sign_in_email">Email</label>
              <input
                type="email"
                class="form-control"
                id="your_sign_in_email"
                aria-describedby="yourSignInEmailHelp"
                name="email"
                required
              />
              <small id="yourSignInEmailHelp" class="form-text text-muted"
                >Please fill up this field</small
              >
            </div>
            <div class="form-group">
              <label class="text_dark" for="sign-in-password">Password</label>
              <input
                type="password"
                class="form-control"
                id="sign-in-password"
                aria-describedby="sign-in-password-help"
                name="password"
                required
              />
              <small id="sign-in-password-help" class="form-text text-muted"
                >Please fill up this field</small
              >
            </div>
            <div class="form-group">
              <button id="login-btn" type="submit" class="btn btn-success">Sign In</button>
            </div>
            <p class="text_dark">Forget password? <a href="#">Click Here</a></p>
          </form>
        </div>

        <div class="col-12 offset-sm-1 col-sm-6">
          <h1 class="text_dark mt-5 mb-4">Sign Up</h1>

          <form method="POST" action="../backend/signup.php" enctype="multipart/form-data">
            <div class="form-row">
              <div class="col-12 mb-3">
                <label class="text_dark">Profile Picture</label>
                <div class="custom-file">
                  <input
                    type="file"
                    accept=".jpg, .jpeg, .png"
                    class="custom-file-input text_dark"
                    id="validatedCustomFile"
                    name="dp"
                    required
                  />
                  <label class="custom-file-label" for="validatedCustomFile"
                    >Upload your image .....</label
                  >
                  <div class="invalid-feedback">Invalid file</div>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-12 col-sm-6 mb-3">
                <label class="text_dark" for="your_first_name"
                  >First Name</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="your_first_name"
                  aria-describedby="yourFirstNameHelp"
                  name="first_name"
                  required
                />
                <small id="yourFirstNameHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
              <div class="col-12 col-sm-6 mb-3">
                <label class="text_dark" for="your_last_name">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="your_last_name"
                  aria-describedby="yourLastNameHelp"
                  name="last_name"
                  required
                />
                <small id="yourLastNameHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </div>

            <div class="form-row">
              <div class="col-12 mb-3">
                <label class="text_dark" for="your_birth_date"
                  >Birth Date</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="your_birth_date"
                  aria-describedby="yourBirthdateHelp"
                  placeholder="ex: 20 June, 1997"
                  name="birth_date"
                  required
                />
                <small id="yourBirthdateHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </div>

            <div class="form-row">
              <div class="col-12 mb-3">
                <label class="text_dark" for="your_contact"
                  >Contact No (Mobile)</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="your_contact"
                  aria-describedby="yourContactHelp"
                  name="contact"
                  required
                />
                <small id="yourContactHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </div>

            <div class="form-row">
              <div class="col-12 mb-3">
                <label class="text_dark" for="your_dept">Department</label>
                <input
                  type="text"
                  class="form-control"
                  id="your_dept"
                  aria-describedby="yourDeptHelp"
                  name="dept_name"
                  required
                />
                <small id="yourDeptHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </div>

            <div class="form-row">
              <div class="col-12 col-sm-6 mb-3">
                <label class="text_dark" for="your_roll">Roll</label>
                <input
                  type="text"
                  class="form-control"
                  id="your_roll"
                  aria-describedby="yourRollHelp"
                  name="roll"
                  required
                />
                <small id="yourRollHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
              <div class="col-12 col-sm-6 mb-3">
                <label class="text_dark" for="your_batch">Batch</label>
                <input
                  type="text"
                  class="form-control"
                  id="your_batch"
                  aria-describedby="yourBatchHelp"
                  name="batch_no"
                  required
                />
                <small id="yourBatchHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </div>

            <div class="form-row">
              <div class="col-12 mb-3">
                <label class="text_dark" for="your_email">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="your_email"
                  aria-describedby="yourEmailHelp"
                  name="email"
                  required
                />
                <small id="yourEmailHelp" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </div>

            <div class="form-row">
              <div class="col-12 mb-3">
                <label class="text_dark" for="sign-up-password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="sign-up-password"
                  aria-describedby="sign-up-password-help"
                  name="password"
                  required
                />
                <small id="sign-up-password-help" class="form-text text-muted"
                  >Please fill up this field</small
                >
              </div>
            </div>

            <div class="form-row">
              <div class="col-12 mb-3">
                <button id="signup-btn" type="submit" class="btn btn-success">Sign Up</button>
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
    <script src="../js/bs-custom-file-input.min.js"></script>

    <script>
      $(document).ready(function() {
        bsCustomFileInput.init();

        $('#your_email').keyup(() => {
          let email = $('#your_email')[0];

          // checking for existing email in database
          if(email.validity.valid) {
            if (window.XMLHttpRequest) {
                xmlhttp=new XMLHttpRequest();
            }
            else {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function() {
              if (this.readyState==4 && this.status==200) {
                if(this.responseText === "true") {
                  $("#yourEmailHelp").removeClass("text-muted").addClass("text-danger font-weight-bold");
                  $("#yourEmailHelp").text("This email is already in use");
									$('#signup-btn').attr('disabled', 'disabled');
                } else {
                  $("#yourEmailHelp").removeClass("text-danger font-weight-bold").addClass("text-muted");
                  $("#yourEmailHelp").text("Please fill up this field");
                  $('#signup-btn').removeAttr('disabled');
                }
              }
            }

            xmlhttp.open('GET', '../backend/user_existence_check.php?email='+email.value, true);
            xmlhttp.send();
          }
        });
          
        // login function
        $('#login-form').submit((e) => {
          e.preventDefault();
          let loginEmail = $('#your_sign_in_email')[0].value;
          let loginPass = $('#sign-in-password')[0].value;
          
          if (window.XMLHttpRequest) {
              xmlhttp=new XMLHttpRequest();
          }
          else {
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }

          xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
              if(this.responseText === "error") {
                $("#yourSignInEmailHelp").removeClass("text-muted").addClass("text-danger font-weight-bold");
                $("#yourSignInEmailHelp").text("Invalid Email or Password");
                $("#sign-in-password-help").removeClass("text-muted").addClass("text-danger font-weight-bold");
                $("#sign-in-password-help").text("Invalid Email or Password");
                
              } else if(this.responseText === "not_approved_error") {
                $("#yourSignInEmailHelp").removeClass("text-muted").addClass("text-danger font-weight-bold");
                $("#yourSignInEmailHelp").text("Your account is not approved yet");
                $("#sign-in-password-help").removeClass("text-muted").addClass("text-danger font-weight-bold");
                $("#sign-in-password-help").text("Your account is not approved yet");

              } else if(this.responseText === "success") {
                window.location.replace('../layouts/profile.php');
              }
            }
          }

          xmlhttp.open('GET', '../backend/login.php?email='+loginEmail+'&password='+loginPass, true);
          xmlhttp.send();
        }) 
      });
    </script>
    <!-- endbuild -->
  </body>
</html>
