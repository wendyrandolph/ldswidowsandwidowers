<?php
/*
 * Template Name: Create
Template Post Type: Account
 */

/* other PHP code here */
session_start();

get_header(); ?>



<div class="container page-section"> 
 <div class="one-half bye" style="background-image: url('/images/login_photo_shephard.webp'); background-repeat: no-repeat; background-size: auto; "></div>
  
        <div class="full-width" style="padding: 20px; margin: 0 auto; ">
           
                <br><br> 
   

          <h5 class="heading1 heading2"> First time users create an account here.</h5>
           <ul style="margin-left: 50px; "> 
             <strong> Benefits of creating an account: </strong> 
             <li> Your basic contact info is saved for the next conference you choose to register for, and you won't have to enter it each time. Just update as necessary. </li>
             <li> You'll be able to log in and see your registration information on your profile page. And won't need to keep track of an email. </li>
             <li> Ability to update, and cancel registrations as necessary if you have created an account. </li> 
             <li> When you create an account, you'll have access to recorded content from past conferences, which some material has been requested to keep just within our widowed group. </li> 
             </ul>
      <!--   <p class='display'> In an effort to help utilize future conference registrations, and have easy access to recorded content that we've been asked to keep only amongst our
        group, we have created an account system here on our site. The process is easy, and quick, after you've created an account you'll be able to login, and have access to the
        most recent Salt Lake City conference material, and recordings that we've been able to add to the site already. </p>
   
   <p class="display"> Please enter your email, if you registered for the March 2023 Salt Lake conference, please use that email address. </p>
        -->   
         <form id="create" action="/accounts1/index.php" method="post">
        <form action="/accounts1/index.php" method="post">
             <?php  get_template_part('template-parts/content', 'form'); ?>
             
             
             <div class="grid-5">
            <div></div><div></div><div>  If you have already created an account: <br></div></div> 
             <div class="grid-5">
             <button class="btn btn--blue full-width" type="submit" name="submit" id="submit">Next </button>
                <input type="hidden" name="level" value=1>
                <!--Add the action name - value pair -->
                <input type="hidden" name="action" value="register">
                <div></div>
                <button class="btn full-width" style="background: #4C7F9F"> <a  class="btn btn--blue:hover"  href="/account/login">Login</a></button>
                
                </div> 
        </form>
    </div> 
  
</div>
</div>   <script>
        var state1 = "<?php echo $_SESSION['clientData']['state'] ?>";
        var state2 = "<?php echo $_SESSION['clientData']['state'] ?>";

        if (state1 != "Utah") {
            county.value = " ";
            county.style.display = "none";
            county1.style.display = "none";
        } else {
            county.style.display = "visible";
            county1.style.display = "visible";

        }

        if (state2 != "Other") {
            country.style.display = "none";
            country1.style.display = "none";
        } else {
            country.style.display = "inline-block";
            country1.style.display = "inline-block";
        }


        var state = document.getElementById('state');

        var reg_form = document.querySelector('form');
        reg_form.addEventListener('input', function(event) {
            // Do something...

            if (state.value != "Utah") {
                county.value = " ";
                county.style.display = "none";
                county1.style.display = "none";
            } else {
                county.style.display = "inline-block";
                county1.style.display = "inline-block";

            }

            if (state.value != "Other") {
                country.value = " ";
                country.style.display = "none";
                country1.style.display = "none";
                zipcode.style.display = "inline-block";

            } else {
                country.style.display = "inline-block";
                country1.style.display = "inline-block";
                zipcode.style.display = "none";

            }


            // county.style.display = "visible";
            // county1.style.display = "visible";

        });
    </script>
<?php get_footer() ?>