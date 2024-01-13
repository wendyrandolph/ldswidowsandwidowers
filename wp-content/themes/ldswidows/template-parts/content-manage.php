<h5 class="heading1 heading2" style="color: white;">Conferences You are Registered For</h5>
                     <?php 
        if ($_SESSION['remarried'] == "True") { ?>
         <li><a class="nav-link" href="/conferences/remarried-conference/remarried-registration">Remarried Life</a></li>
        <?php } 
         if ($_SESSION['idaho'] == "True") { ?>
            <li><a class="nav-link" href="/conferences/idaho-regional-conference/idaho-registration">Idaho Regional Conference</a></li>
       <?php } 
          if ($_SESSION['sanAntonio'] == "True") { ?>
            <li><a class="nav-link" href="/conferences/san-antonio-regional/san-antonio-registration">San Antonio Registration</a></li>
        <?php  }  
         if ($_SESSION['arizona'] == "True") { ?>
            <li><a class="nav-link" href="/conferences/arizona-regional/arizona-registration">Arizona Registration</a></li>
        <?php  
        }elseif( $_SESSION['arizona'] == "False" && $_SESSION['sanAntonio'] == "False") {  ?>
                  <p class="t-center headline--tiny"> You are not currently registered for any conferences.  </p> 
       <?php  } ?>

 <h5 class="heading1 heading2" style="color: white;">Open Registrations</h5>
   <?php  if($_SESSION['sanAntonio'] == "False" OR $_SESSION['arizona'] == "False"){ 
        
               if ($_SESSION['remarried'] == "False") { ?>
       
           <!-- <button class="btn btn--blue btn--blue:hover t-center"><a style="color: white; text-decoration: none;" href="/conferences/remarried-conference/remarried-registration">Register for Remarried</a></button>
-->
        <?php  }
       if ($_SESSION['idaho'] == "False") { ?>
         <!--   <button class="btn btn--blue btn--blue:hover t-center"><a text-decoration: none;" href="/conferences/idaho-regional-conference/idaho-registration">Register for Idaho</a></button>
-->
        <?php  } 
     if ($_SESSION['sanAntonio'] == "False") { ?>
          <button class="btn btn--blue:hover t-center" style="background-color: #722F37;">  <a style="color: white; text-decoration: none;" href="/conferences/san-antonio-regional/san-antonio-registration">San Antonio</a></button>

        <?php   } 
     if ($_SESSION['arizona'] == "False") { ?>
            <button class="btn btn--desert btn--desert:hover t-center" ><a style="color: white; text-decoration: none;" href="/conferences/arizona-regional/arizona-registration">Arizona</a></button>

        <?php   } 
        }  ?>
        </div> <br><br> 
       <div>
        <button class="btn btn--dark-orange btn--dark-orange:hover t-center full-width"><a style="color: white; text-decoration: none;" href="/accounts1/index.php/?action=logout">Logout</a></button>
</div> 
    </div> 

     
    