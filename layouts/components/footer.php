<?php
  include "../backend/connect_db.php";
  include "../backend/find_president.php";
?>

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
        <?php
          if(isset($president['contact'])) {
            ?>
              <i class="fa fa-phone fa-lg pr-2"></i>
              <a href="tel:<?php echo $president['contact'] ?>"><?php echo $president['contact'] ?></a><br />
            <?php
          }
        ?>
        <i class="fa fa-envelope fa-lg pr-2"></i>
        <a href="mailto:kuetradioofficial@gmail.com">kuetradioofficial@gmail.com</a>
      </div>
      <div class="col-12 col-sm-4">
        <h5>Follow Us on</h5>
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
    <div class="row justify-content-center mt-4">
      <div class="col-auto">
        <p class="text-center">
          © Copyright <span id="present_copyright_year"></span> KUET Radio |
          Developed By
          <a href="https://www.showrin.com" target="_blank">Showrin Barua</a>
        </p>
      </div>
    </div>
  </div>
</footer>