<!DOCTYPE html>
<html <?php language_attributes()?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <script src="https://kit.fontawesome.com/6b66ab3fd0.js" crossorigin="anonymous"></script>
    <?php wp_head(); 
     ?>
</head>
<body <?php body_class()?> > 
<header class="site-header">
     <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="<?php echo site_url()?>"><strong>LDS</strong> Widows & Widowers</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
        <ul>
              <li <?php if(is_page('about-us') or wp_get_post_parent_id(0) == 11) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('about-us')?>">About Us</a></li>
              <li <?php if(get_post_type() == 'presenters') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('presenters') ?>">Presenters</a></li>
              <li <?php if(get_post_type() == 'event') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('event') ?>">Events</a></li>
              <li <?php if(get_post_type() == 'conference') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('conference') ?>">Conferences</a></li>
              <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a  href="<?php echo site_url('/blog');?>">Blog</a></li>
              <li> <?php if(!$_SESSION['loggedin']){ ?> 
                <a href="<?php echo site_url('account/login');?>">Login</a>
              <?php }else{ ?>
              <a href="<?php echo site_url('account/profile');?>">Profile</a></li>
              <li><a href="<?php echo site_url('accounts1/index.php/?action=logout');?>">Logout</a></li>
            <?php  } ?>
            </ul>

          </nav>
          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>

         
          </div>
        </div>
      </div>
      
    </header>