 <?php // This is for the Arizona contact form 
    ?>


<div> 
     <form method="post" name="myemailform" action="/users/index.php" class="full-width" style="background-color: wheat; ">
         <header class="heading1 "> Have questions regarding the Arizona Conference? </header> <br>
          <fieldset class="full-width;"> 

            <br><input type="text" name="name" class="rounded-input" required placeholder="Enter Name"><br><br>
            <br><input type="text" name="subject" class="rounded-input" style="width: 50%;" required placeholder="Subject of the Email"><br><br>
            <br> <input type="text" name="email" class="rounded-input" required placeholder="Enter Email Address"><br><br>

             <br><textarea name="message" class="rounded-input" style="width: 50%; height: 200px;" required placeholder="Type Message Here"></textarea><br><br>

             <button class="btn btn--blue" type="submit" id="submit">Send Form </button>
             <input type="hidden" name="action" value="emailForm">
         </fieldset>
     </form>
     </div>
