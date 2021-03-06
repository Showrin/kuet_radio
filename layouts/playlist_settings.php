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
                  <a class="dropdown-item active" href="./playlist_settings.php"
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

    <!-- add_song_modal starts -->
    <div id="add_song_modal" class="modal fade" role="dialog">
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
            <form id="upload-song-form" method="POST" action="../backend/song_upload.php" enctype="multipart/form-data">
              <div class="form-group">
                <label class="text_dark" for="song_name">Song Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="song_name"
                  aria-describedby="songNameHelp"
                  name="song_name"
                  placeholder="Enter song name"
                />
                <small id="songNameHelp" class="form-text text-muted"
                  ></small
                >
              </div>
              <div class="form-group">
                <label class="text_dark" for="singer_name">Singer Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="singer_name"
                  aria-describedby="singerNameHelp"
                  name="singer_name"
                  placeholder="Enter singer name"
                />
                <small id="singerNameHelp" class="form-text text-muted"
                  ></small
                >
              </div>
              <div class="form-row">
                <div class="col-12 mb-3">
                  <label class="text_dark">Upload the song</label>
                  <div class="custom-file">
                    <input
                      type="file"
                      accept=".mp3, .m4a, .oog"
                      class="custom-file-input text_dark"
                      id="uploaded-song"
                      name="song"
                    />
                    <label class="custom-file-label" for="uploaded-song"
                      >Upload the song .....</label
                    >
                    <div class="invalid-feedback">Invalid file</div>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <label class="text_dark" for="song-duration">Song Duration <small>(in Second)</small></label>
                <input
                  type="text"
                  class="form-control"
                  id="song-duration"
                  aria-describedby="durationHelp"
                  name="duration"
                  readonly
                />
              </div>

              <audio id="audio-player-for-uploaded-song"></audio>
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
            <button id="upload-song-btn" type="submit" class="btn btn-success">Upload</button>
          </div>
        </div>
      </div>
    </div>
    <!-- add_song_modal ends -->

    <!-- comment_modal starts -->
    <?php
      include './components/comment_modal.php';
    ?>
    <!-- comment_modal ends -->

    <div class="container my-5">
      <div class="row">
        <div class="col-12 col-sm-10 mt-5 mb-0 mb-sm-4">
          <h1 class="text_dark">Playlist Settings</h1>
        </div>
        <div class="col-12 col-sm-2 mt-3 mt-sm-5 mb-5 mb-sm-4">
          <a
            class="btn btn-sm btn-block bg-success text-white cursor_pointer"
            data-toggle="modal"
            data-target="#add_song_modal"
            >Add New</a
          >
        </div>

        <div class="col-12">
          <div class="row">
						<?php
							include "../backend/find_all_songs.php";
							while($song = mysqli_fetch_assoc($songs)) {
						?>
							<div class="col-12 col-sm-4">
								<div class="media song-card box_shadow_basic p-3 card_border_radius">
									<div class="media-body text_dark h-100">
										<div class="row h-100">
											<div class="col-12 d-flex flex-wrap h-100">
												<h5 class="w-100">
													<?php echo $song['name']; ?>
												</h5>
												<div class="text-primary w-100">
													<?php echo $song['singer']; ?>
												</div>
												<a
													href="../backend/delete_song.php?id=<?php echo $song['id']; ?>"
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

        let objectUrl;

        $("#audio-player-for-uploaded-song").on("canplaythrough", function(e){
          var duration = e.currentTarget.duration;

          $("#song-duration")[0].value = duration;
          URL.revokeObjectURL(objectUrl);
        });

        $("#uploaded-song").change(function(e){
          let file = e.currentTarget.files[0];
          
          objectUrl = URL.createObjectURL(file);
          $("#audio-player-for-uploaded-song").prop("src", objectUrl);
        });
        
        $("#upload-song-btn").click(() => {
          $("#upload-song-form").submit();
        })
      });
    </script>
    <!-- endbuild -->
  </body>
</html>
