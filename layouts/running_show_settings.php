<?php
  include "../backend/is_logged_in_check.php";

  $id = $_SESSION['id'];

  include "../backend/connect_db.php";
  include "../backend/find_user_info.php";
  include '../backend/find_team_members.php';
  include '../backend/find_current_show.php';
  include '../backend/find_current_guests.php';
  include '../backend/find_current_rjs.php';
  include '../backend/find_shows.php';

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
                  <a class="dropdown-item active" href="./running_show_settings.php"
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
          <h1 class="text_dark mt-5 mb-4">Running Show Settings</h1>

          <form id="start_show_form" method="POST" action="../backend/update_current_show.php" enctype="multipart/form-data">
            <div class="form-row">
              <div class="col-12 mb-3">
                <label class="text_dark" for="show_name">Show Name</label>
                <select
                  class="form-control"
                  id="show_name"
                  aria-describedby="showNameHelp"
                  name="show_name"
                  required
                >
                  <?php
                    while($show = mysqli_fetch_assoc($scheduled_shows)) {
                      ?>
                        <option <?php if(isset($running_show_info) && strtolower($running_show_info['name']) === strtolower($show['show_name'])) { echo 'selected'; } ?>><?php echo $show['show_name'] ?></option>
                      <?php
                    }
                  ?>
                </select>
                <small id="showNameHelp" class="form-text text-muted"
                  ></small
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
                        <input type="checkbox" class="form-check-input" id='rj-<?php echo $member['id'] ?>' name='rjs[]' value="<?php echo $member['id'] ?>" <?php if(isset($rj_list) && in_array($member['id'], $rj_list)) { echo 'checked'; } ?> />
                        <label class="form-check-label" for="rj-<?php echo $member['id'] ?>"><?php echo $member['first_name'] . ' ' . $member['last_name'] ?></label>
                      </div>
                    </div>
                  <?php
                }
              ?>
            </div>

            <div class="form-row">
              <div class="col-12 mb-3">
                <label class="text_dark" for="guest_amount"
                  >Amount of Guests</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="guest_amount"
                  aria-describedby="guestAmountHelp"
                  name="guest_amount"
                  <?php if(isset($running_show_info)) { echo 'value="' . $running_show_info['no_of_guests'] . '"'; } ?>
                  required
                />
                <small id="guestAmountHelp" class="form-text text-muted"
                  ></small
                >
              </div>
            </div>

            <?php
              if(mysqli_num_rows($running_show_guests)) {
                $index = 1;
                
                while($guest = mysqli_fetch_assoc($running_show_guests)) {
                  if($index == 1){
                    ?>
                      <div class="guestDiv_permanent">
                        <h4 class="text_dark mt-4 mb-3">Guest #<?php echo $index ?></h4>
                        <div class="form-row">
                          <div class="col-12 col-sm-4 mb-3">
                            <label class="text_dark" for="guest1_name">Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="guest1_name"
                              name="guest1_name"
                              aria-describedby="guest1_nameHelp"
                              <?php if($guest['name'] != '') { echo 'value="' . $guest['name'] . '"'; } ?>
                              required
                            />
                            <small id="guest1_nameHelp" class="form-text text-muted"
                              ></small
                            >
                          </div>
                          <div class="col-12 col-sm-4 mb-3">
                            <label class="text_dark" for="guest1_dept"
                              >Department (Optional)</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="guest1_dept"
                              name="guest1_dept"
                              <?php if($guest['department'] != '') { echo 'value="' . $guest['department'] . '"'; } ?>
                              aria-describedby="guest1_depttHelp"
                            />
                            <small id="guest1_depttHelp" class="form-text text-muted"
                              ></small
                            >
                          </div>
                          <div class="col-12 col-sm-4 mb-3">
                            <label class="text_dark" for="guest1_batch"
                              >Batch (Optional)</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="guest1_batch"
                              name="guest1_batch"
                              <?php if($guest['batch'] != '') { echo 'value="' . $guest['batch'] . '"'; } ?>
                              aria-describedby="guest1_batchHelp"
                            />
                            <small id="guest1_batchHelp" class="form-text text-muted"
                              ></small
                            >
                          </div>
                        </div>
    
                        <div class="form-row">
                          <div class="col-12 mb-3">
                            <label class="text_dark" for="guest1_description"
                              >Other Description (Optional)</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="guest1_description"
                              name="guest1_description"
                              <?php if($guest['other_description']  != '') { echo 'value="' . $guest['other_description'] . '"'; } ?>
                              aria-describedby="guest1_descriptionHelp"
                            />
                            <small
                              id="guest1_descriptionHelp"
                              class="form-text text-muted"
                              ></small
                            >
                          </div>
                        </div>
                        
                        <div class="form-row">
                          <div class="col-12 mb-3">
                            <label class="text_dark">Display Picture</label>
                            <div class="custom-file">
                              <input
                                type="file"
                                accept=".jpg, .jpeg, .png"
                                class="custom-file-input text_dark"
                                id="guest1_dp"
                                name="guest1_dp"
                                required
                              />
                              <label class="custom-file-label" for="guest1_dp"
                                >Upload your image .....</label
                              >
                              <div class="invalid-feedback">Invalid file</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php
                  } else {
                    ?>
                      <div class="guestDiv">
                        <h4 class="text_dark mt-4 mb-3">Guest #<?php echo $index ?></h4>
                        <div class="form-row">
                          <div class="col-12 col-sm-4 mb-3">
                            <label class="text_dark" for="guest<?php echo $index; ?>_name">Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="guest<?php echo $index; ?>_name"
                              name="guest<?php echo $index; ?>_name"
                              aria-describedby="guest<?php echo $index; ?>_nameHelp"
                              <?php if($guest['name'] != '') { echo 'value="' . $guest['name'] . '"'; } ?>
                              required
                            />
                            <small id="guest<?php echo $index; ?>_nameHelp" class="form-text text-muted"
                              ></small
                            >
                          </div>
                          <div class="col-12 col-sm-4 mb-3">
                            <label class="text_dark" for="guest<?php echo $index; ?>_dept"
                              >Department (Optional)</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="guest<?php echo $index; ?>_dept"
                              name="guest<?php echo $index; ?>_dept"
                              <?php if($guest['department'] != '') { echo 'value="' . $guest['department'] . '"'; } ?>
                              aria-describedby="guest<?php echo $index; ?>_depttHelp"
                            />
                            <small id="guest<?php echo $index; ?>_depttHelp" class="form-text text-muted"
                              ></small
                            >
                          </div>
                          <div class="col-12 col-sm-4 mb-3">
                            <label class="text_dark" for="guest<?php echo $index; ?>_batch"
                              >Batch (Optional)</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="guest<?php echo $index; ?>_batch"
                              name="guest<?php echo $index; ?>_batch"
                              <?php if($guest['batch'] != '') { echo 'value="' . $guest['batch'] . '"'; } ?>
                              aria-describedby="guest<?php echo $index; ?>_batchHelp"
                            />
                            <small id="guest<?php echo $index; ?>_batchHelp" class="form-text text-muted"
                              ></small
                            >
                          </div>
                        </div>
    
                        <div class="form-row">
                          <div class="col-12 mb-3">
                            <label class="text_dark" for="guest<?php echo $index; ?>_description"
                              >Other Description (Optional)</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="guest<?php echo $index; ?>_description"
                              name="guest<?php echo $index; ?>_description"
                              <?php if($guest['other_description']  != '') { echo 'value="' . $guest['other_description'] . '"'; } ?>
                              aria-describedby="guest<?php echo $index; ?>_descriptionHelp"
                            />
                            <small
                              id="guest<?php echo $index; ?>_descriptionHelp"
                              class="form-text text-muted"
                              ></small
                            >
                          </div>
                        </div>
                        
                        <div class="form-row">
                          <div class="col-12 mb-3">
                            <label class="text_dark">Display Picture</label>
                            <div class="custom-file">
                              <input
                                type="file"
                                accept=".jpg, .jpeg, .png"
                                class="custom-file-input text_dark"
                                id="guest<?php echo $index; ?>_dp"
                                name="guest<?php echo $index; ?>_dp"
                                required
                              />
                              <label class="custom-file-label" for="guest<?php echo $index; ?>_dp"
                                >Upload your image .....</label
                              >
                              <div class="invalid-feedback">Invalid file</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php
                  }

                  $index++;
                }
              } else {
                ?>
                  <div class="guestDiv_permanent">
                    <h4 class="text_dark mt-4 mb-3">Guest #1</h4>
                    <div class="form-row">
                      <div class="col-12 col-sm-4 mb-3">
                        <label class="text_dark" for="guest1_name">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="guest1_name"
                          name="guest1_name"
                          aria-describedby="guest1_nameHelp"
                          required
                        />
                        <small id="guest1_nameHelp" class="form-text text-muted"
                          ></small
                        >
                      </div>
                      <div class="col-12 col-sm-4 mb-3">
                        <label class="text_dark" for="guest1_dept"
                          >Department (Optional)</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="guest1_dept"
                          name="guest1_dept"
                          aria-describedby="guest1_depttHelp"
                        />
                        <small id="guest1_depttHelp" class="form-text text-muted"
                          ></small
                        >
                      </div>
                      <div class="col-12 col-sm-4 mb-3">
                        <label class="text_dark" for="guest1_batch"
                          >Batch (Optional)</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="guest1_batch"
                          name="guest1_batch"
                          aria-describedby="guest1_batchHelp"
                        />
                        <small id="guest1_batchHelp" class="form-text text-muted"
                          ></small
                        >
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-12 mb-3">
                        <label class="text_dark" for="guest1_description"
                          >Other Description (Optional)</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="guest1_description"
                          name="guest1_description"
                          aria-describedby="guest1_descriptionHelp"
                        />
                        <small
                          id="guest1_descriptionHelp"
                          class="form-text text-muted"
                          ></small
                        >
                      </div>
                    </div>
                    
                    <div class="form-row">
                      <div class="col-12 mb-3">
                        <label class="text_dark">Display Picture</label>
                        <div class="custom-file">
                          <input
                            type="file"
                            accept=".jpg, .jpeg, .png"
                            class="custom-file-input text_dark"
                            id="guest1_dp"
                            name="guest1_dp"
                            required
                          />
                          <label class="custom-file-label" for="guest1_dp"
                            >Upload your image .....</label
                          >
                          <div class="invalid-feedback">Invalid file</div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
              }
            ?>

            <div id="startShowFormSubmitBtn" class="form-row">
              <div class="col-12 mt-4 mb-3">
                <button type="submit" class="btn btn-success" <?php if(!mysqli_num_rows($running_show)) { echo "disabled"; } ?>>
                  Update The Show
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

        $("#guest_amount").on("keyup", function() {
          let guestAmount = this.value;

          $("#startShowFormSubmitBtn").remove();

          $(".guestDiv").remove();

          for (let i = 2; i <= guestAmount; i++) {
            $("#start_show_form").append(guestInputFieldSetter(i));
          }

          $(
            "#start_show_form"
          ).append(`<div id="startShowFormSubmitBtn" class="form-row">
                      <div class="col-12 mt-4 mb-3">
                        <button type="submit" class="btn btn-success" <?php if(!mysqli_num_rows($running_show)) { echo "disabled"; } ?>>
                          Update The Show
                        </button>
                      </div>
                    </div>`);
          
          bsCustomFileInput.init();
        });

        // ------------------ guest input field setter -----------------------
        function guestInputFieldSetter(guestNo) {
          let guestInputField = `<div class="guestDiv">
                    <h4 class="text_dark mt-4 mb-3">Guest #${guestNo}</h4>
                    <div class="form-row">
                        <div class="col-12 col-sm-4 mb-3">
                            <label class="text_dark" for="guest${guestNo}_name">Name</label>
                            <input type="text" class="form-control" id="guest${guestNo}_name" name="guest${guestNo}_name" aria-describedby="guest${guestNo}_nameHelp" required>
                            <small id="guest${guestNo}_nameHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-12 col-sm-4 mb-3">
                            <label class="text_dark" for="guest${guestNo}_dept">Department (Optional)</label>
                            <input type="text" class="form-control" id="guest${guestNo}_dept" name="guest${guestNo}_dept" aria-describedby="guest${guestNo}_depttHelp">
                            <small id="guest${guestNo}_depttHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="col-12 col-sm-4 mb-3">
                            <label class="text_dark" for="guest${guestNo}_batch">Batch (Optional)</label>
                            <input type="text" class="form-control" id="guest${guestNo}_batch" name="guest${guestNo}_batch" aria-describedby="guest${guestNo}_batchHelp">
                            <small id="guest${guestNo}_batchHelp" class="form-text text-muted"></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label class="text_dark" for="guest${guestNo}_description">Other Description (Optional)</label>
                            <input type="text" class="form-control" id="guest${guestNo}_description" name="guest${guestNo}_description" aria-describedby="guest${guestNo}_descriptionHelp">
                            <small id="guest${guestNo}_descriptionHelp" class="form-text text-muted"></small>
                        </div>
                    </div>

                    <div class="form-row">
                      <div class="col-12 mb-3">
                        <label class="text_dark">Display Picture</label>
                        <div class="custom-file">
                          <input
                            type="file"
                            accept=".jpg, .jpeg, .png"
                            class="custom-file-input text_dark"
                            id="guest${guestNo}_dp"
                            name="guest${guestNo}_dp"
                            required                
                          />
                          <label class="custom-file-label" for="guest${guestNo}_dp"
                            >Upload your image .....</label
                          >
                          <div class="invalid-feedback">Invalid file</div>
                        </div>
                      </div>
                    </div>
                
                </div>`;

          return guestInputField;
        }
      });
    </script>
    <!-- endbuild -->
  </body>
</html>
