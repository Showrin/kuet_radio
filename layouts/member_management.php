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
                  src="../img/2. Mrinmoy Mandal Tushar.jpg"
                  class="mr-2 card_img_thumbnail card_img_thumbnail--small rounded-circle"
                />
                Mrinmoy
              </a>
              <div
                class="dropdown-menu dropdown-menu-left"
                aria-labelledby="memberOptions"
                id="memberOptionsDropdownArea"
              >
                <a class="dropdown-item" href="./profile.php">Profile</a>
                <a class="dropdown-item" href="./start_a_show.php"
                  >Start a Show</a
                >
                <a class="dropdown-item" href="./comments.php">Comments</a>
                <a class="dropdown-item" href="./running_show_settings.php"
                  >Running Show Settings</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./song_requests.php"
                  >Song Requests</a
                >
                <a class="dropdown-item" href="./account_requests.php"
                  >Account Requests</a
                >
                <a class="dropdown-item" href="./playlist_settings.php"
                  >Playlist Settings</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./schedule_settings.php"
                  >Schedule Settings</a
                >
                <a class="dropdown-item" href="./server_settings.php"
                  >Server Settings</a
                >
                <a class="dropdown-item active" href="./member_management.php"
                  >Member Management</a
                >
                <a class="dropdown-item" href="./committee_posts_settings.php"
                  >Committee Posts Settings</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./logout.php">Logout</a>
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
              src="../img/2. Mrinmoy Mandal Tushar.jpg"
              class="mr-2 card_img_thumbnail card_img_thumbnail--large rounded-circle"
            />
          </div>
          <div
            class="col-12 col-lg-6 pl-lg-0 text-center text-lg-left mb-4 mb-lg-0"
          >
            <h2 class="font_muli_light">Mrinmoy Mandal Tusher</h2>
            <h5 class="mt-2 mb-3"><strong>President</strong></h5>
            <h5 class="text-uppercase text-primary">Admin</h5>
          </div>
          <div class="col-6 col-lg-3 offset-3 offset-lg-0">
            <a
              href="./start_a_show.php"
              class="btn btn-sm btn-block bg-primary text-white"
              >Start a Show</a
            >
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
            <button type="submit" class="btn btn-success">Comment</button>
          </div>
        </div>
      </div>
    </div>
    <!-- comment_modal ends -->

    <!-- member_update_modal starts -->
    <div id="member_update_modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="content">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text_dark">Change Role of Apurba Das</h4>
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
                <label class="text_dark d-block" for="member_designation"
                  >Designation</label
                >
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="designation"
                    id="role1"
                    value="option1"
                    checked
                  />
                  <label class="form-check-label" for="role1">President</label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="designation"
                    id="role2"
                    value="option1"
                  />
                  <label class="form-check-label" for="role2"
                    >Assistant General Secretary</label
                  >
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="designation"
                    id="role3"
                    value="option1"
                  />
                  <label class="form-check-label" for="role3"
                    >General Secretary</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label class="text_dark d-block" for="member_designation"
                  >Authority Level</label
                >
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="authorityLevel"
                    id="authority1"
                    value="option1"
                    checked
                  />
                  <label class="form-check-label" for="authority1">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="authorityLevel"
                    id="authority2"
                    value="option1"
                  />
                  <label class="form-check-label" for="authority2"
                    >Moderator</label
                  >
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="authorityLevel"
                    id="authority3"
                    value="option1"
                  />
                  <label class="form-check-label" for="authority3"
                    >Editor</label
                  >
                </div>
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
            <button type="submit" class="btn btn-success">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- member_update_modal ends -->

    <div class="container my-5">
      <div class="row">
        <div class="col-12 col-sm-9 mt-5 mb-4">
          <h1 class="text_dark">Member Management</h1>
        </div>

        <div class="col-12">
          <div class="media box_shadow_basic p-3 card_border_radius mb-4">
            <img
              src="../img/3. Apurba Dash.jpg"
              class="align-self-center mr-3 mr-sm-5 card_img_thumbnail rounded-circle"
            />
            <div class="media-body text_dark">
              <div class="row">
                <div class="col-12 col-sm-9">
                  <h5>
                    Apurba Das <small class="text-primary">(Admin)</small>
                  </h5>
                  <h6>
                    President
                  </h6>
                  <div class="text-black-50">
                    Industrial Engineering and Management
                  </div>
                  <div class="text-black-50">#1509030, Batch 2K15</div>
                  <div class="text-black-50">Birthday: 16 June, 1996</div>
                  <div class="text-black-50">Contact No: 018123456789</div>
                  <div class="text-black-50">Email: abcd@gmail.com</div>
                </div>
                <div class="col-12 col-sm-3 align-self-center mt-3 mt-sm-0">
                  <button
                    class="btn btn-sm btn-block bg-warning text-black"
                    data-toggle="modal"
                    data-target="#member_update_modal"
                  >
                    Update
                  </button>
                  <button
                    href="./start_a_show.php"
                    class="btn btn-sm btn-block bg-danger text-white"
                  >
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="media box_shadow_basic p-3 card_border_radius mb-4">
            <img
              src="../img/3. Apurba Dash.jpg"
              class="align-self-center mr-3 mr-sm-5 card_img_thumbnail rounded-circle"
            />
            <div class="media-body text_dark">
              <div class="row">
                <div class="col-12 col-sm-9">
                  <h5>
                    Apurba Das <small class="text-primary">(Admin)</small>
                  </h5>
                  <h6>
                    President
                  </h6>
                  <div class="text-black-50">
                    Industrial Engineering and Management
                  </div>
                  <div class="text-black-50">#1509030, Batch 2K15</div>
                  <div class="text-black-50">Birthday: 16 June, 1996</div>
                  <div class="text-black-50">Contact No: 018123456789</div>
                  <div class="text-black-50">Email: abcd@gmail.com</div>
                </div>
                <div class="col-12 col-sm-3 align-self-center mt-3 mt-sm-0">
                  <button
                    class="btn btn-sm btn-block bg-warning text-black"
                    data-toggle="modal"
                    data-target="#member_update_modal"
                  >
                    Update
                  </button>
                  <button
                    href="./start_a_show.php"
                    class="btn btn-sm btn-block bg-danger text-white"
                  >
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="media box_shadow_basic p-3 card_border_radius mb-4">
            <img
              src="../img/3. Apurba Dash.jpg"
              class="align-self-center mr-3 mr-sm-5 card_img_thumbnail rounded-circle"
            />
            <div class="media-body text_dark">
              <div class="row">
                <div class="col-12 col-sm-9">
                  <h5>
                    Apurba Das <small class="text-primary">(Admin)</small>
                  </h5>
                  <h6>
                    President
                  </h6>
                  <div class="text-black-50">
                    Industrial Engineering and Management
                  </div>
                  <div class="text-black-50">#1509030, Batch 2K15</div>
                  <div class="text-black-50">Birthday: 16 June, 1996</div>
                  <div class="text-black-50">Contact No: 018123456789</div>
                  <div class="text-black-50">Email: abcd@gmail.com</div>
                </div>
                <div class="col-12 col-sm-3 align-self-center mt-3 mt-sm-0">
                  <button
                    class="btn btn-sm btn-block bg-warning text-black"
                    data-toggle="modal"
                    data-target="#member_update_modal"
                  >
                    Update
                  </button>
                  <button
                    href="./start_a_show.php"
                    class="btn btn-sm btn-block bg-danger text-white"
                  >
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="media box_shadow_basic p-3 card_border_radius mb-4">
            <img
              src="../img/3. Apurba Dash.jpg"
              class="align-self-center mr-3 mr-sm-5 card_img_thumbnail rounded-circle"
            />
            <div class="media-body text_dark">
              <div class="row">
                <div class="col-12 col-sm-9">
                  <h5>
                    Apurba Das <small class="text-primary">(Admin)</small>
                  </h5>
                  <h6>
                    President
                  </h6>
                  <div class="text-black-50">
                    Industrial Engineering and Management
                  </div>
                  <div class="text-black-50">#1509030, Batch 2K15</div>
                  <div class="text-black-50">Birthday: 16 June, 1996</div>
                  <div class="text-black-50">Contact No: 018123456789</div>
                  <div class="text-black-50">Email: abcd@gmail.com</div>
                </div>
                <div class="col-12 col-sm-3 align-self-center mt-3 mt-sm-0">
                  <button
                    class="btn btn-sm btn-block bg-warning text-black"
                    data-toggle="modal"
                    data-target="#member_update_modal"
                  >
                    Update
                  </button>
                  <button
                    href="./start_a_show.php"
                    class="btn btn-sm btn-block bg-danger text-white"
                  >
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="media box_shadow_basic p-3 card_border_radius mb-4">
            <img
              src="../img/3. Apurba Dash.jpg"
              class="align-self-center mr-3 mr-sm-5 card_img_thumbnail rounded-circle"
            />
            <div class="media-body text_dark">
              <div class="row">
                <div class="col-12 col-sm-9">
                  <h5>
                    Apurba Das <small class="text-primary">(Admin)</small>
                  </h5>
                  <h6>
                    President
                  </h6>
                  <div class="text-black-50">
                    Industrial Engineering and Management
                  </div>
                  <div class="text-black-50">#1509030, Batch 2K15</div>
                  <div class="text-black-50">Birthday: 16 June, 1996</div>
                  <div class="text-black-50">Contact No: 018123456789</div>
                  <div class="text-black-50">Email: abcd@gmail.com</div>
                </div>
                <div class="col-12 col-sm-3 align-self-center mt-3 mt-sm-0">
                  <button
                    class="btn btn-sm btn-block bg-warning text-black"
                    data-toggle="modal"
                    data-target="#member_update_modal"
                  >
                    Update
                  </button>
                  <button
                    href="./start_a_show.php"
                    class="btn btn-sm btn-block bg-danger text-white"
                  >
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Radio Player Starts -->
    <div class="radio-player">
      <div class="container">
        <div class="row">
          <div class="col-2 d-none d-sm-flex align-items-center">
            <img
              src="../img/logo.png"
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
      <source src="../audios/KUET_RADIO_Intro_song_short.m4a" />
    </audio>

    <audio id="main-but-hidden-radio-player">
      <source src="http://95.154.196.33:27878/;stream" />
      <source src="http://109.169.23.22:26954/;stream" />
    </audio>
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
              © Copyright <span id="present_copyright_year"></span> KUET Radio |
              Developed By
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
    <script src="../js/scripts.js"></script>
    <!-- endbuild -->
  </body>
</html>