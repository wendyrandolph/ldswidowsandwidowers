<footer class="site-footer">
  <div class="site-footer__inner container container--narrow">
    <div class="group">
      <div class="site-footer__col-one">
        <h1 class="school-logo-text school-logo-text--alt-color">
          <a href="<?php echo site_url() ?>"><strong>LDS</strong>Widows & Widowers</a>
        </h1>
        <p><a class="site-footer__link" href="mailto:admin@ldswidowsandwidowers.com?subject=subject text">admin@ldswidowsandwidowers.com</a></p>
        <p>**Please note this site is best with Chrome as the browser.</p>
      </div>
      <div class="site-footer__col-two-three-group">
        <div class="site-footer__col-four">
          <h3 class="headline headline--small">Explore</h3>
          <nav class="nav-list">
            <!-- <?php wp_nav_menu(array(
                    'theme_location' => 'footerLocationOne',

                  ))
                  ?> -->

            <ul>
              <li><a href="<?php echo site_url('about-us') ?>">About Us</a></li>
              <li><a href="/conferences">Conferences</a></li>
              <li><a href="/events">Events</a></li>
              <li><a href="/resources">Resources</a></li>
            </ul>

          </nav>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="search-overlay">
  <div class="search-overlay__top">
    <div class="container">
      <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
      <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
      <i class="fa fa-window-close search-overlay__icon" aria-hidden="true"></i>
    </div>
  </div>
</div>
<script>
  var loggedin = <?php echo (json_encode($_SESSION['loggedin'])); ?>;
  var last_activity = <?php echo (json_encode($_SESSION['last_activity'])); ?>;
  var time = <?php echo (json_encode($_SESSION['time'])); ?>;
  var logoutTime = <?php echo (json_encode($_SESSION['logoutTime'])); ?>;
</script>
<script type="text/javascript" src=" /library/account.js"></script>
<?php wp_footer(); ?>
</body>

</html>