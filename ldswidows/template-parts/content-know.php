   <div class="grid-container">
       <div>
           <h5 class="heading1">Here's your need to know</h5>
           <?php conferenceDates();

            if ($post->ID == '3455') {
                echo   "<hr><br><strong> Friday's Church Location: </strong> <br><br> <a href='https://maps.app.goo.gl/U4qJdbr2dEFqdJx56'> 2339 S. Crisman Rd., Mesa, AZ 85209 </a>";
            


                $locationName = get_field('name_of_location'); ?>
               <hr class="separation">



               <strong>Saturday's Church Location: </strong><br><strong><?php echo $locationName ?></strong> <br>
               <?php
            
                $location = get_field('address');
                $map = get_field('google_maps_link'); ?>
               <a href="<?php echo $map; ?>" target="_blank"><?php echo $location ?></a>
               <br>
               <hr class="separation">
               <strong> Dress: </strong><?php the_field('conference_dress'); ?>
               <br>
               <hr class="separation">
               <strong>Who this is for: </strong><?php the_field('who'); ?>
               <br>
               <hr class="separation">

               <p style="color: red;"><strong> Suggested Donation: </strong><?php the_field('suggested_donation'); ?></p><br><br>

               <br>
               <hr class="separation">
               <?php  } else { 
                fyi();
               }
            if ($post->ID == '3455') {
                if ($_SESSION['loggedin']) { ?>
                   <strong> You can send your donation through Venmo here: </strong><br><br>
                   <a style=" padding: 3px;  " href="https://account.venmo.com/u/Julie-NewsomeRasmussen" target="_blank">https://account.venmo.com/u/Julie-NewsomeRasmussen</a> <br>
                   <br>
                   <strong> Or you can mail a check made out to "LDS Widows & Widowers" and mail it to: </strong>
                   <ul style="list-style: none">
                       <li>Julie Rasmussen</li>
                       <li>4368 E Harwell Court</li>
                       <li>Gilbert, AZ 85234</li>
                   </ul> <br><br>
                   <?php get_template_part('template-parts/email', 'form'); ?>


               <?php }
            }
            if ($post->ID == '2741') { ?>

               <strong> If you haven't sent your donation yet, here's the Venmo link: </strong> <br><br>
               <a style=" padding: 3px;  " href="https://account.venmo.com/u/JoellaGrayGifford" target="_blank">https://account.venmo.com/u/JoellaGrayGifford</a> <br>

           <?php  }
           /* if ($post->ID == '2984') { ?>
              
              <div><strong> As the St George Conference approaches, a few reminders: </strong>

                <li> We are not arranging for housing or transportation. If you are in need of such assistance, please reach out to others in the group you are friends with. </li>
                <li>Bring a jacket! St George can be cold in January.</li>
                <li>The St George temple will be open at the time of the conference! </li>
                </div> <br>
                <div> <strong> 
                Our purpose in putting on this incredible, uplifting conference </strong>  is to have all come and build 
                friendships, have fun, increase our love for the Savior, to gain tools to help and encourage us to live 
                like the Savior did, and receive all of the blessings and love He has for us! </div><br> 

<strong> This conference is dedicated to the spiritual and temporal needs of those who have lost a spouse. </strong> It 
will be an opportunity for widows and widowers to get together and support and uplift each other. It is supported by 
The Church of Jesus Christ of Latter-Day Saints but not officially sponsored by the church. The organizers take full 
responsibility for the content of the conference. Content is based on the principles and teachings of The Church of 
Jesus Christ of Latter-Day Saints.
<?php get_template_part('template-parts/emailStG', 'form'); ?>
<!-- Please direct questions or inquiries to: southernutahww@gmail.com -->

        <?php    } */ ?>
       </div>

       <div class=" page-links">
           <?php get_template_part('template-parts/content', 'pagelinks'); ?>
       </div> <!-- End of Page-links Div -->
   </div>