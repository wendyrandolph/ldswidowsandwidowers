<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');

$_SESSION['loggedin'];
//echo $_SESSION['loggedin'];



?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script type="text/javascript" src=" /library/account.js"></script>
  <?php wp_head();
  ?>
  <script type="text/javascript">
    function printDiv() {
      var printContents = document.getElementById("printMe").innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }

</script> 

</head>

<body <?php body_class() ?>>
  <header class="site-header">
    <div class="container">
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
    </div>
    <div class="container">


      <h1 class="school-logo-text float-left ">
        <a href="<?php echo site_url() ?>"><strong>LDS</strong> Widows & Widowers</a><br>

      </h1>

      <div  class="site-header__menu group ">
          <nav class="main-navigation">
          <ul>
              <li <?php if(is_page('about-us') or wp_get_post_parent_id(0) == 11) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('about-us')?>">About Us</a></li>
             <!-- <li <?php if(get_post_type() == 'event' OR is_page('past-events')) echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('event') ?>">Events</a></li>-->
              <li <?php if(get_post_type() == 'conference') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('conference') ?>">Conferences</a></li>
              <li <?php if(is_page('resources') or wp_get_post_parent_id(0) == 3000) echo 'class="current-menu-item"' ?>><a href="<?php echo get_permalink('3000') ?>">Resources</a></li>
  
    <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
      
            </ul>
  </nav>
          
          <div class="site-header__util">
<?php if(!$_SESSION['loggedin']){ ?>
<a href="/account/login" class="btn btn--small btn--white float-left push-right">Login</a>
<?php }else{ ?>
<a href="<?php echo get_post_type_archive_link('keynote') ?>" class="btn btn--small btn--white float-left push-right" >Recordings</a></li>
<a href="/account/profile" class="btn btn--small btn--white float-left push-right">Profile</a>  
<a href="/accounts1/index.php?action=logout" class="btn btn--small btn--dark-orange float-left push-right">Logout</a>
<?php } ?> 
        </div>
      </div>


  </header>