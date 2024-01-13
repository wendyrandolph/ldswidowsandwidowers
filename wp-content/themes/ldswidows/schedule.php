<?php
/*
 * Template Name: schedule
 Template Post Type: conference

/* other PHP code here */
session_start();


$_SESSION['confId2'];
$confId2 = $_SESSION['confId2'];
$_SESSION['conf1'];
$conf1 = $_SESSION['conf1'];
$_SESSION['userId'];
$_SESSION['remarried'];
$_SESSION['spouse'];
//echo $_SESSION['spouse']; 
//echo $_SESSION['remarried'];
$userId = $_SESSION['userId'];
//var_dump($_SESSION); 
//exit; 




$_SESSION['registr'] = "TRUE";
//var_dump($_SESSION['clientData']);

$clientData =  $_SESSION['clientData'];

get_header();


?>
<div class="page-banner">
  <?php pageBanner(array(
    'title' => $conf1
  ));
  //Grab the parent Id to aide in the brcrumb 
  $theParent1 = wp_get_post_parent_id(); ?>
</div>

<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <?php
      //Grab the parent Id to aide in the breadcrumb 
      $theParent1 = wp_get_post_parent_id();
      ?>

      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

    </p>
  </div>

  <div class="grid-container">
    <div>
      <?php if ($post->ID == '2744') { ?>
        <a href="javascript:void(0);" onclick="processPrint('printMe');" />Print Class Schedule</a><br><br>
        <div id="printMe">
          <h5 class="heading1"> <?php echo $conf1; ?> Schedule </h5>
          <p class="t-left"> <strong>Location:</strong><a href="https://goo.gl/maps/q8SrWN1iECC3Hahv5" target="__blank"> 825 E 500 N St American Fork, UT 84003 </a> </p>

          <h5 class='headline headline--tiny question'> Friday September 22, 2023 </h5>

          <p class="t-left"> <strong> Friday Evening Social</strong> <br>
            Stan and Michelle Lockhart's home. <br>
            <a href="https://goo.gl/maps/VNpZFh5f8ThxhYPF8" target="_blank"> 2473 N 1180 W <br>
              Pleasant Grove, Utah 84062 </a><br>
            <strong> Time: </strong> 6:30-9:00pm <br>
            Bring a snack or treat to share
          </p> <br>
          <?php
          $workshop1_time_R = "10:10am - 11:00am";
          $workshop2_time_R = "11:10am - 12:00pm";
          $workshop3_time_R = "1:40pm - 2:30pm";
          $workshop4_time_R = " 2:40pm - 3:30pm";

          $args1 = array(
            'post_type' => 'presenters',
            'offset' => 0,
            'category' => array(21),
            'title_li' => '',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1
          );


          $myposts1 = get_posts($args1);

          ?>

          <h5 class="headline headline--tiny question"> Saturday - September 23, 2023 </h5>

          <p class="t left"><strong> 8:00am - 9:00am </strong> - Check In/ Registration / Light Breakfast </p>
          <p class="t left"><strong> 9:00am - 10:00am </strong> - Opening Keynote - Brian Chandler </p>
          <!-- Workshop 1 -->
          <h6 class="workshopHeader"> Workshop 1 - <strong> <? echo $workshop1_time_R; ?></strong> </h6>
          <div class="workshop1">
            <div class="workshopDisplay">
              <div class="presenter_Disp"><strong>Presenter</strong></div>
              <div class="title_Disp"><strong>Title</strong></div>
              <div class="room_Disp"><strong>Room</strong></div> <?php
                                                                  foreach ($myposts1 as $post) : setup_postdata($post);

                                                                    workshop1_R();
                                                                  endforeach; ?>
            </div>
          </div>

          <!-- Workshop 2 -->
          <h6 class="workshopHeader"> Workshop 2 - <strong><? echo $workshop2_time_R; ?></strong> </h6>
          <div class="workshop2">
            <div class="workshopDisplay">
              <div class="presenter_Disp"><strong>Presenter</strong></div>
              <div class="title_Disp"><strong>Title</strong></div>
              <div class="room_Disp"><strong>Room</strong></div><?php
                                                                foreach ($myposts1 as $post) : setup_postdata($post);
                                                                  workshop2_R();
                                                                endforeach; ?>
            </div>
          </div>

          <br>
          <p class="t left"><strong> 12:10pm - 1:30pm </strong> - Lunch </p>

          <!-- Workshop 3 -->
          <h6 class="workshopHeader"> Workshop 3 - <? echo $workshop3_time_R; ?> </h6>
          <div class="workshop3">
            <div class="workshopDisplay">
              <div class="presenter_Disp"><strong>Presenter</strong></div>
              <div class="title_Disp"><strong>Title</strong></div>
              <div class="room_Disp"><strong>Room</strong></div>
              <?php
              foreach ($myposts1 as $post) : setup_postdata($post);
                workshop3_R();
              endforeach; ?>
            </div>
          </div>
          <!-- Workshop 4 -->
          <h6 class="workshopHeader"> Workshop 4 - <? echo $workshop4_time_R; ?> </h6>
          <div class="workshop4">
            <div class="workshopDisplay">
              <div class="presenter_Disp"><strong>Presenter</strong></div>
              <div class="title_Disp"><strong>Title</strong></div>
              <div class="room_Disp"><strong>Room</strong></div><?php
                                                                foreach ($myposts1 as $post) : setup_postdata($post);
                                                                  workshop4_R();
                                                                endforeach; ?>
            </div>
          </div>
          <br>




          <p class="t left"><strong> 3:30pm - 5:00pm </strong> - Closing Keynote with Daniel & Rebecca Mehr & Questions</p>
        </div>
    </div>
    <div class="page-links">
      <?php
        wp_reset_postdata();
        get_template_part('template-parts/content', 'pagelinks'); ?>
    </div> <!-- End of Page-links Div -->
  </div>
<?php }
      //Idaho Schedule Page 
      if ($post->ID == '2740') {

        $workshop1_time_Id = "10:30am - 11:15am";
        $workshop2_time_Id = "11:30am - 12:15pm";
        $workshop3_time_Id = "1:45pm - 2:30pm";
        $workshop4_time_Id = "2:45pm - 3:30pm";
        $workshop5_time_Id = "3:45pm - 4:30pm";



        $args1 = array(
          'post_type' => 'presenters',
          'offset' => 0,
          'category' => array(19),
          'title_li' => '',
          'orderby' => 'title',
          'order' => 'ASC',
          'posts_per_page' => -1
        );


        $myposts1 = get_posts($args1);

?>
  <h5 class="heading1">
    <?php echo $conf1 ?> Schedule </h5>



  <h5 class='headline headline--tiny question'> Thursday September 14th, 2023 </h5>
  <br>
  <p class="t left"><strong> 6:00pm - 8:00pm</strong> - You can choose to do a session at either the Boise Temple, or the Meridian Temple. Please make an appointment.</p>
  <p class="t left"><strong> 8:30 - 10pm</strong> - We'll meet up at Lovejoys for ice cream and visiting. <br> Lovejoys Address: <a href="https://goo.gl/maps/JTvarwXoq5TX3szq5" target="__blank"><br>1760 S Meridian Rd #101-B<br> Meridian, ID 83642</a> </p>

  <h5 class='headline headline--tiny question'> Friday September 15th, 2023 </h5>
  <p class="t left"><strong> 9:00am - 12:00pm</strong> - There will be three activities to choose from.
  <ul style="list-style: none;">
    <li><strong> Pickleball </strong><a href="https://goo.gl/maps/K6To9MwQBQSW9Nh26">936 Taylor Ave, Meridian, Idaho 83642</a></li>
    <li><strong> Park/ Walk </strong> <a href="https://goo.gl/maps/ywj5C5xUYTiaU9d99">1900 N Records Way, Meridian, ID 83642 </a> - Meeting at the playground area across the road from the North park lot.</li>
    <li><strong> Service Project </strong> This will be held at the church.</li>
  </ul>
  </p>
  <p class="t left"><strong> 12:30pm </strong> - Lunch ** Hamburgers, chips, watermelon, and condiments </p>
  <p class="t left">You're on your own to explore with a new friend. </p>
  <p class="t left"><strong>7:00pm </strong> - Fireside with Tiffany Barker<br>
    <iframe width="380" height="315" src="https://www.youtube.com/embed/_-c5HSiu56Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

  <h5 class='headline headline--tiny question'> Saturday September 16th, 2023 </h5>

  <p class="t left"><strong> 8:30am </strong> - Check In / Registration </p>
  <p class="t left"><strong> 9:30am - 10:15am</strong> - Opening Keynote - Mari van Ormer</p>
  <!-- Workshop 1 -->
  <!-- <input style = "background-color:skyblue;" width = 30px height = 20px type = "button" value = "Print" onclick = "printDiv()"/>  
    --> <input type="button" onclick="printDiv();" value="Print Me" />
  <div id="printMe">
    <h6 class="workshopHeader"> Workshop 1 - <? echo $workshop1_time_Id; ?> </h6>

    <div class="workshop1">
      <div class="workshopDisplay">
        <div class="presenter_Disp"><strong>Presenter</strong></div>
        <div class="title_Disp"><strong>Title</strong></div>
        <div class="room_Disp"><strong>Room</strong></div>
        <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop1_Id();
        endforeach; ?>
      </div>
    </div>

    <!-- Workshop 2 -->
    <h6 class="workshopHeader"> Workshop 2 - <? echo $workshop2_time_Id; ?> </h6>
    <div class="workshop2">
      <div class="workshopDisplay">
        <div class="presenter_Disp"><strong>Presenter</strong></div>
        <div class="title_Disp"><strong>Title</strong></div>
        <div class="room_Disp"><strong>Room</strong></div>

        <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop2_Id();
        endforeach; ?>
      </div>
    </div><br>

    <p class="t left"><strong> 12:20pm - 1:40pm </strong> - Lunch ** Pulled pork, smoked turkey, BB sauce, BB beans, potato salad, rolls & cookie - Catered by Goodwood </p>
    <!-- Workshop 3 -->
    <h6 class="workshopHeader"> Workshop 3 - <? echo $workshop3_time_Id; ?> </h6>
    <div class="workshop3">
      <div class="workshopDisplay">
        <div class="presenter_Disp"><strong>Presenter</strong></div>
        <div class="title_Disp"><strong>Title</strong></div>
        <div class="room_Disp"><strong>Room</strong></div>
        <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop3_Id();
        endforeach; ?>
      </div>
    </div>
    <!-- Workshop 4 -->
    <h6 class="workshopHeader"> Workshop 4 - <? echo $workshop4_time_Id; ?> </h6>
    <div class="workshop4">
      <div class="workshopDisplay">
        <div class="presenter_Disp"><strong>Presenter</strong></div>
        <div class="title_Disp"><strong>Title</strong></div>
        <div class="room_Disp"><strong>Room</strong></div>
        <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop4_Id();
        endforeach; ?>
      </div>
    </div>
    <!-- Workshop 5-->
    <h6 class="workshopHeader"> Workshop 5 - <? echo $workshop5_time_Id; ?> </h6>
    <div class="workshop5">
      <div class="workshopDisplay">
        <div class="presenter_Disp"><strong>Presenter</strong></div>
        <div class="title_Disp"><strong>Title</strong></div>
        <div class="room_Disp"><strong>Room</strong></div>
        <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop5_Id();
        endforeach; ?>
      </div>
    </div>
  </div>
  <br>
  <p class="t left"><strong> 4:45pm - 5:30pm</strong> - Closing Keynote - Jennie Taylor</p>
  <p class="t left"><strong> 7:30pm </strong> -After Conference Party - Banana Splits, games, dancing & socializing.</p>
  <h5 class='headline headline--tiny question'> Sunday September 17th, 2023 </h5>
  <p class="t left"><strong> 9:00am </strong> - Church for those who are looking for a meeting before you travel home.</p>


</div>
<div class="page-links">
  <?php
        wp_reset_postdata();
        get_template_part('template-parts/content', 'pagelinks'); ?>
</div> <!-- End of Page-links Div -->
</div>

<?php }

      //*******************************************************************************************************************           
      //*********************Begin the San Antonio Conference Schedule ********************************************************
      //*******************************************************************************************************************

      if ($post->ID == '3461') {
        $workshop1_time_SA = "9:40am - 10:30am";
        $workshop2_time_SA = "10:45am - 11:35am";
        $workshop3_time_SA = "11:50am - 12:40pm";
        $workshop4_time_SA = "1:35pm - 2:25pm";
        $workshop5_time_SA = "2:40pm - 3:30pm";
        $workshop6_time_SA = "3:45pm - 4:35pm";



        $args1 = array(
          'post_type' => 'presenters',
          'offset' => 0,
          'category' => array(30),
          'title_li' => '',
          'orderby' => 'title',
          'order' => 'ASC',
          'posts_per_page' => -1
        );


        $myposts1 = get_posts($args1);

?>
  <!-- <h5 class="heading1">
   <?php echo $conf1 ?> Schedule </h5> -->



  <h5 class='headline headline--tiny heading1'> Friday November 10th, 2023 </h5>
  <br>
  <p class="t left">Friday before the fireside is free-form, so please enjoy your time here in beautiful San Antonio!
    We’ve lined up some possible gathering spots to meet other widows, make friends, and see some of our iconic
    landmarks. Join us for any, all, or none, at your leisure.</p>

  <h5 class='headline headline--tiny question'>Morning Activities</h5>
  <p class="t left"><strong>9:00am - Hike </strong> - Meet at Trailhead to Government Canyon </p>
  <p class="t left"><strong>9:00am - Attend the Temple </strong> - Endowment Session <br>
    <a href="https://www.churchofjesuschrist.org/temples/details/san-antonio-texas-temple?lang=eng" target="_blank">San Antonio Temple</a>
  </p>
  <p class="t left"> Please call the Temple <strong>210-538-0034</strong> to reserve a seat for an Endowment Session.
    We have seats reserved under “Widow and Widower Conf.” at 9:00am and 1:30pm.</p>
  <p class="t left"><strong>12:30pm - Lunch is on your own</strong></p><br>

  <h5 class='headline headline--tiny question'>Afternoon Activities</h5>
  <ul style="list-style: none;">
    <li><strong>1:30pm</strong></li>
    <ul style="list-style: none;">
      <li><strong>Opportunity to attend the temple </strong> - <a href="https://www.churchofjesuschrist.org/temples/details/san-antonio-texas-temple?lang=eng" target="_blank">San Antonio Temple</a></li>
    </ul>

    <li><strong>2:00pm</strong></li>
    <ul style="list-style: none;">
      <li><strong> Hike</strong></li>
    </ul>

    <li><strong>3:00pm</strong></li>
    <ul style="list-style: none;">
      <li><strong>Narrated Riverwalk Cruise </strong> - $14.50 meet at the Rivercenter Mall ticket booth <a href="https://goo.gl/maps/7VBydoNUxw22TM6eA" target="_blank">849 E River Walk, San Antonio, TX 78205</a> </li>
    </ul>
    <li><strong>4:00pm</strong></li>
    <ul style="list-style: none;">
      <li><strong>Visit El Mercado </strong> - Historic Market Square <a href="https://goo.gl/maps/zZYBCYZ3nozLTqAN6" target="_blank">514 West Commerce Street, San Antonio, TX</a> </li>
    </ul>
  </ul>
  <h5 class='headline headline--tiny question'>5:00pm - 6:30pm - Dinner is on your own </h5><br>
  <p class="t left"> <strong>7:00pm </strong> - Devotional with Jennifer Dial as the speaker. <br>
    <a href=" https://maps.app.goo.gl/KpTeb3vcrUpWBBZj9">The Chapel at 13153 Iron Horse Way, Helotes, TX 78023 </a>
  </p>
  <p class="t left"><strong>8:15pm -10:00pm </strong> - Fast-Friends Social </p><br>


  <h5 class='headline headline--tiny heading1'> Saturday November 11th, 2023 </h5><br>
  Conference Location: <a href=" https://maps.app.goo.gl/KpTeb3vcrUpWBBZj9">The Chapel at 13153 Iron Horse Way, Helotes, TX 78023 </a><br>
  <p class="t left"><strong> 8:45am </strong> -Registration</p>
  <p class="t left"><strong> 9:00am </strong> - Welcome </p>
  <!-- Workshop 1 -->
  <h6 class="workshopHeader"> Workshop 1 - <? echo $workshop1_time_SA; ?> </h6>
  <div class="workshop1">
    <div class="workshopDisplay">
      <div class="presenter_Disp"><strong>Presenter</strong></div>
      <div class="title_Disp"><strong>Title</strong></div>
      <div class="room_Disp"><strong>Room</strong></div>
      <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop1_SA();
        endforeach; ?>
    </div>
  </div>

  <!-- Workshop 2 -->
  <h6 class="workshopHeader"> Workshop 2 - <? echo $workshop2_time_SA; ?> </h6>
  <div class="workshop2">
    <div class="workshopDisplay">
      <div class="presenter_Disp"><strong>Presenter</strong></div>
      <div class="title_Disp"><strong>Title</strong></div>
      <div class="room_Disp"><strong>Room</strong></div>

      <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop2_SA();
        endforeach; ?>
    </div>
  </div>


  <!-- Workshop 3 -->
  <h6 class="workshopHeader"> Workshop 3 - <? echo $workshop3_time_SA; ?> </h6>
  <div class="workshop3">
    <div class="workshopDisplay">
      <div class="presenter_Disp"><strong>Presenter</strong></div>
      <div class="title_Disp"><strong>Title</strong></div>
      <div class="room_Disp"><strong>Room</strong></div>
      <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop3_SA();
        endforeach; ?>
    </div>
  </div><br>
  <p class="t left"><strong> 12:40pm - 1:30pm </strong> - Deli Lunch in the Cultural Hall </p>
  <!-- Workshop 4 -->
  <h6 class="workshopHeader"> Workshop 4 - <? echo $workshop4_time_SA; ?> </h6>
  <div class="workshop4">
    <div class="workshopDisplay">
      <div class="presenter_Disp"><strong>Presenter</strong></div>
      <div class="title_Disp"><strong>Title</strong></div>
      <div class="room_Disp"><strong>Room</strong></div>
      <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop4_SA();
        endforeach; ?>
    </div>
  </div>
  <!-- Workshop 5-->
  <h6 class="workshopHeader"> Workshop 5 - <? echo $workshop5_time_SA; ?> </h6>
  <div class="workshop5">
    <div class="workshopDisplay">
      <div class="presenter_Disp"><strong>Presenter</strong></div>
      <div class="title_Disp"><strong>Title</strong></div>
      <div class="room_Disp"><strong>Room</strong></div>
      <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop5_SA();
        endforeach; ?>
    </div>
  </div>

  <!-- Workshop 6-->
  <h6 class="workshopHeader"> Workshop 6 - <? echo $workshop6_time_SA; ?> </h6>
  <div class="workshop6">
    <div class="workshopDisplay">
      <div class="presenter_Disp"><strong>Presenter</strong></div>
      <div class="title_Disp"><strong>Title</strong></div>
      <div class="room_Disp"><strong>Room</strong></div>
      <?php
        foreach ($myposts1 as $post) : setup_postdata($post);
          workshop6_SA();
        endforeach; ?>
    </div>
  </div>
  <br>
  <p class="t left"><strong> 5:00pm - 6:45pm </strong> - Texas BBQ Dinner - Cultural Hall </p>
  <p class="t left"><strong> 7:00pm - 8:00pm</strong> - Closing Keynote - Louis & Beverly Chemin </p>
  <p class="t left"><strong> 8:15pm - 10:00pm </strong> - Texas Under the Stars - Outside - S'mores Round the Fire, Guitars and Campfire songs, Yard Games (Horsehoes
    ,Cornhole, Kan Jam, KUB)</p>
  <p class="t left"><strong> 8:15pm - 10:00pm </strong> - Inside - Table Games </p>

  </div>
  <div class="page-links">
    <?php
        wp_reset_postdata();
        get_template_part('template-parts/content', 'pagelinks'); ?>
  </div> <!-- End of Page-links Div -->
  </div>

<?php }

      //*******************************************************************************************************************           
      //*********************Begin Arizona Conference Schedule ********************************************************
      //*******************************************************************************************************************

      if ($post->ID == '3458') {
        $workshop1_time_AZ = "11:15am - 12:00pm";
        $workshop2_time_AZ = "12:15pm - 1:00pm";
        $workshop3_time_AZ = "2:30pm - 3:15pm";
        $workshop4_time_AZ = "3:30pm - 4:15pm";




        $args1 = array(
          'post_type' => 'presenters',
          'offset' => 0,
          'category' => array(31),
          'title_li' => '',
          'orderby' => 'title',
          'order' => 'ASC',
          'posts_per_page' => -1
        );


        $myposts1 = get_posts($args1);

?>
  <!-- <h5 class="heading1">
   <?php echo $conf1 ?> Schedule </h5> -->


        

        <a href="<?php echo $map; ?>" target="_blank"><?php echo $location ?></a>
  <h5 class="question"> Conference Address </h5>
  <p class="t-left">  <strong> Friday's Church Location: </strong> <a href='https://maps.app.goo.gl/U4qJdbr2dEFqdJx56'> 2339 S. Crisman Rd., Mesa, AZ 85209 </a></p>
     
  <p class="t-left"> <strong>Saturday's Church Location: </strong><a href="https://goo.gl/maps/KsyWAzeDor4RKQSY7">10036 E Brown Rd, Mesa, AZ 85207, United States </a></p>

  <h5 class='headline headline--tiny heading1'> Thursday November 2nd, 2023 </h5>
  <br>
  <p class="t left"><strong> 5:30pm </strong>Pre-conference dinner (provided) & games at Larry Jackson's home <a href="https://maps.app.goo.gl/usDyR4N8TsBEi4z88">1734 E Lockwood St, Mesa, AZ 85203 </a>. </p>
  <h5 class='headline headline--tiny heading1'> Friday November 3rd, 2023 </h5>
  <p class="t left">On Friday there are a variety of activities we have lined up for you to enjoy.</p>
  <header class="question">Temple </header>
  <p class="t left"><strong> Choose either temple for a session at the listed times, please make your reservation ahead of time.</strong> </p>
  <ul style="list-style: none">
    <li class="t left"><strong>8:00am Temple Session at the </strong>
      <a href="https://maps.app.goo.gl/R59C5tSB4Y1BYSjm6" target="_blank">Gilbert Temple</a> -
      3301 S Greenfield Rd
      Gilbert AZ 85297
    </li>
    <li class="t left"><strong>8:30am Temple Session at the </strong>
      <a href="https://maps.app.goo.gl/V5FLwJ86Lpr8biXX8" target="_blank">Mesa Temple</a> -
      101 S LeSueur
      Mesa AZ 85204-1031
    </li>
    <hr>
    <header class="question"> Riparian Preserve</header>
    </li>
    <ul style="list-style: none">

      <li><strong>8:30AM - Riparian Preserve </strong> at Water Ranch, <a href="https://maps.app.goo.gl/MDeQYoF2SRy1FWZPA" target="_blank">2757 E Guadalupe Rd, Gilbert, AZ 85234</a> (Park at the Library and meet Peggy Ash at the floating bridge), easy stroll on flat dirt paths. </li>
      <li><strong>11:00AM - Riparian Preserve </strong> at Water Ranch, <a href="https://maps.app.goo.gl/MDeQYoF2SRy1FWZPA" target="_blank">2757 E Guadalupe Rd, Gilbert, AZ 85234</a> (Park at the Library and meet Amy Brown Hickman at the floating bridge), easy stroll on flat dirt paths. </li>
    </ul>

    <header class="question"> Activities & Service Project at the LDS Church Building </header>
    <br><strong> Address: </strong><a href=" https://maps.app.goo.gl/gzgXckEZCyYhPpUk6" target="__blank">2339 S. Crismon Road, Mesa, AZ 85209</a>
    <strong>10:00am - 2:00pm - </strong>
    <li class="t left">Pickleball, 9-square,Board Games, Service projects</li>

    <li class="t left" stlye="list-style: square"><strong> Service Project Info: </strong> </li>
    <ul>
      <li class="t left"> There will be a box in the foyer for anyone who wants to contribute a pair of warm/fuzzy socks (men's or women's) to be donated to a local cancer center. </li>

      <li class="t-left">There will be two ongoing service projects on Friday (10am-1pm) & Saturday (8am-4pm) at the Church building. Drop by anytime. </li>

      The project room is a quiet place to sit and chat while your hands are busy serving. <br><br>

      <li> <strong>Two Projects are available: </strong></li>
      <ul>
        <li>1) Make card and write notes of appreciation to be attached to U.S. flags and given to the Veterans Association.</li> <br>
        <li>2) Create "washcloth cupcakes" or cards that will be part of Family gift Baskets for Hospice of the Valley </li>
        <br><br>
      </ul>
      <strong>Friday Lunch </strong>- is on your own. <br><br>
      <header class="question">Usery Mtn Regional Park Section C/D </header>
      <br>
      <a href="https://maps.app.goo.gl/JSmHNMes3xHn4Gy27">3939 N Usery Pass Rd, Mesa, AZ 85207</a>.
      <br><br>
      <strong> 2:00pm - </strong> You can begin gathering at this park, there is a $7/per vehicle fee with in and out privileges. The site has paved parking, covered/lighted picnic tables, bathrooms, fire pit, walking trails that are flat. <br><br>
      <li><strong>2:30 & 3:00pm- Wind Caves </strong> - Usery Mtn Regional Park - Led by Tami Workman Berezay & Peggy Ash </li><br>
      <li class="t left"><strong>BBQ Dinner(provided) with dessert around the fire pit.</strong>
        The best time to visit Arizona is November through April where we have blue skies and highs in the 60s 70s and low 80s.
        Nighttime low is 50°, so bring a sweater and a folding chair for the bonfire and barbecue in the desert.



        <br>
        <h5 class='headline headline--tiny heading1'> Saturday November 4th, 2023 </h5><br>
        Conference Location:
        <p class="t-left"> <a href="https://goo.gl/maps/KsyWAzeDor4RKQSY7">10036 E Brown Rd, Mesa, AZ 85207, United States </a></p>
        <p class="t left"><strong>8:00am </strong> - Registration & Continental Breakfast <br>
          <strong>9:00am </strong> - Welcome & Opening Keynote Speaker - Marie Ricks, "Healing from Grief"
        </p>


        <!-- Workshop 1 -->
        <h6 class="workshopHeader"> Workshop 1 - <? echo $workshop1_time_AZ; ?> </h6>
        <div class="workshop1">
          <div class="workshopDisplay">
            <div class="presenter_Disp"><strong>Presenter</strong></div>
            <div class="title_Disp"><strong>Title</strong></div>
            <div class="room_Disp"><strong>Room</strong></div>
            <?php
            foreach ($myposts1 as $post) : setup_postdata($post);
              workshop1_AZ();
            endforeach; ?>
          </div>
        </div>

        <!-- Workshop 2 -->
        <h6 class="workshopHeader"> Workshop 2 - <? echo $workshop2_time_AZ; ?> </h6>
        <div class="workshop2">
          <div class="workshopDisplay">
            <div class="presenter_Disp"><strong>Presenter</strong></div>
            <div class="title_Disp"><strong>Title</strong></div>
            <div class="room_Disp"><strong>Room</strong></div>

            <?php
            foreach ($myposts1 as $post) : setup_postdata($post);
              workshop2_AZ();
            endforeach; ?>
          </div>
        </div>
        <br>
        <h5> 1:00pm - 2:25pm Lunch (provided) in the Cultural Hall </h5>

        <!-- Workshop 3 -->
        <h6 class="workshopHeader"> Workshop 3 - <? echo $workshop3_time_AZ; ?> </h6>
        <div class="workshop3">
          <div class="workshopDisplay">
            <div class="presenter_Disp"><strong>Presenter</strong></div>
            <div class="title_Disp"><strong>Title</strong></div>
            <div class="room_Disp"><strong>Room</strong></div>
            <?php
            foreach ($myposts1 as $post) : setup_postdata($post);
              workshop3_AZ();
            endforeach; ?>
          </div>
        </div><br>
        <!-- Workshop 4 -->
        <h6 class="workshopHeader"> Workshop 4 - <? echo $workshop4_time_AZ; ?> </h6>
        <div class="workshop4">
          <div class="workshopDisplay">
            <div class="presenter_Disp"><strong>Presenter</strong></div>
            <div class="title_Disp"><strong>Title</strong></div>
            <div class="room_Disp"><strong>Room</strong></div>
            <?php
            foreach ($myposts1 as $post) : setup_postdata($post);
              workshop4_AZ();
            endforeach; ?>
          </div>
        </div>

        <br>

        <p class="t left"><strong>4:30pm - Closing Keynote </strong> - Bruce Allred, "The Love of the Lord, and Nauvoo".
          <br>Please note there will be an "Instant Choir" led by Amy Bowler, and all are invited to participate.
        </p>

        <p class="t left"><strong> 5:30pm - Dinner (provided) Cultural Hall</strong> - </p>
        <p class="t left"><strong> After Conference Social </strong> - with Music </p>




        </div>

        <div class="page-links">
          <?php
          wp_reset_postdata();
          get_template_part('template-parts/content', 'pagelinks'); ?>
        </div> <!-- End of Page-links Div -->
        </div>
      <?php }

      ?>



      </div>
      </div>
      <?php

      get_footer();
      unset($_SESSION['delete']);
      unset($_SESSION['success']);
      ?>