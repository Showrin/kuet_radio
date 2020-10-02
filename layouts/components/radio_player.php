<?php

  include "../backend/connect_db.php";
  include "../backend/find_servers.php";
  include '../backend/find_current_show.php';
  include '../backend/find_current_rjs.php';
  include '../backend/find_current_guests.php';

  if(mysqli_num_rows($running_show)) {
    $running_show_info = mysqli_fetch_assoc($running_show);
    $rj_list = [];

    while($rj = mysqli_fetch_assoc($running_show_rjs)) {
      array_push($rj_list, $rj['user_id']);
    }
  }
?>

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
        <h5 class="mb-1 mb-sm-2 text-overflow-ellipsis">
          <span id="playing_title">
            <?php
              if(isset($running_show_info)) {
                echo $running_show_info['name'];
              } else {
                echo 'KUET Radio';
              }
            ?>
              
            <?php
              if(isset($running_show_info)) {
            ?>
              <small>
                (<?php
                  $rj_index = 0;

                  while(isset($rj_list[$rj_index])) {
                    $show_rj_id = $rj_list[$rj_index];
                    $find_show_rj_info = "SELECT * FROM users WHERE id = '$show_rj_id'";
                    $show_rj_name = mysqli_fetch_assoc(mysqli_query($connection, $find_show_rj_info))['first_name'];
                    
                    if($rj_index == 0) {
                      echo 'RJ ' . $show_rj_name;
                    }else {
                      echo ', RJ ' . $show_rj_name;
                    }

                    $rj_index++;
                  }
                ?>)
              </small>
            <?php
              }
            ?>
          </span>
        </h5>
        <h6  id="playing_author" class="mb-0 font_muli_light text-overflow-ellipsis">
          <?php
            if(isset($running_show_info)) {
              ?>
                <strong>Guests:</strong>
                <?php
                  $guest_index = 0;

                  while($guest = mysqli_fetch_assoc($running_show_guests)) {
                    if($guest_index == 0) {
                      echo explode(" ", $guest['name'])[0];
                    }else {
                      echo ', ' . explode(" ", $guest['name'])[0];
                    }

                    $guest_index++;
                  }
                ?>
              <?php
            }
          ?>
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
