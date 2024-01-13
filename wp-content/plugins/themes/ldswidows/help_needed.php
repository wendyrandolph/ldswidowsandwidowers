<?php
/*
 * Template Name: helpNeeded
 */

/* other PHP code here */
//Get the javascript file

session_start();
?><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Needed</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
    
</head>

<body>

<?php get_header();
$userId = $_SESSION['userId']; 
$clientData =  $_SESSION['clientData']; 

?>


<h3 id="title">
       <?php if (isset($_SESSION['volunteerInfo']))
          echo "Welcome " . $_SESSION['volunteerInfo']['firstName'] . ' ' . $_SESSION['volunteerInfo']['lastName']; 
          ?>
</h3>
    <main id="content" class="neve_main">
        <div class="trial"> 
            <div> 
               <h4 id="volunteer_1">Here is a list of tasks we need help with at the conference:</h4>
            <!-- div  is for styling purposes only -->
          
          
            </div>
    <div class="row_1"> 
        <div class="column">
        
           <h4> Thursday Tasks </h4> 
            <label>12:00pm - Table Set Up</label><br>
            <input type="text" id="task_101" name="task_101"   readonly><br>
            <input type="text" id="task_102" name="task_102" value=" " readonly><br>
            <input type="text" id="task_103" name="task_103" value="" readonly><br>
            <input type="text" id="task_104" name="task_104" value="" readonly><br><br>

            <label>Table Decorations</label><br>
            <input type="text" id="task_105" name="task_105" value="Already Filled" readonly><br>
            <input type="text" id="task_106" name="task_106" value="Already Filled" readonly><br><br>

            <label >12:00 pm - Set Up Chairs in Meeting Rooms </label><br>
            <input type="text" id="task_107" name="task_107" value="" readonly><br>
            <input type="text" id="task_108" name="task_108" value="" readonly><br>
            <input type="text" id="task_109" name="task_109" value="" readonly><br><br>
            
            <label>4:00 pm - Set Up Volleyball <br>and Square Dance </label><br>
            <input type="text" id="task_110" name="task_110" value="" readonly><br>
            <input type="text" id="task_111" name="task_111" value="" readonly><br>
            <input type="text" id="task_112" name="task_112" value="" readonly><br><br>

            <label>9:00 pm - Cleanup after the dance </label><br>
            <input type="text" id="task_113" name="task_113" value="" readonly><br>
            <input type="text" id="task_114" name="task_114" value="" readonly><br>
            <input type="text" id="task_115" name="task_115" value="" readonly><br>
            <input type="text" id="task_116" name="task_116" value="" readonly><br><br>

            <label>Empty Garbage & replenish TP (Main Floor Bathrooms)</label><br>
            <input type="text" id="task_117" name="task_117" value="" readonly><br>
            <input type="text" id="task_118" name="task_118" value="" readonly><br>
            <input type="text" id="task_119" name="task_119" value="" readonly><br>
            <input type="text" id="task_120" name="task_120" value="" readonly><br><br>

            <label >Empty Garbage & replenish TP (Upper Floor Bathrooms)</label><br>
            <input type="text" id="task_121" name="task_121" value="" readonly><br>
            <input type="text" id="task_122" name="task_122" value="" readonly><br>
            <input type="text" id="task_123" name="task_123" value="" readonly><br><br>

            <label for="task_108">Empty Garbage & replenish TP (Lower Floor Bathrooms)</label><br>
            <input type="text" id="task_124" name="task_124" value="" readonly><br>
            <input type="text" id="task_125" name="task_125" value="" readonly><br>
            <input type="text" id="task_126" name="task_126" value="" readonly><br><br>



            </div>
            <div class="column" id="test">
             
            <h4> Friday Tasks </h4> 
            <label>1 - 2:30pm Kitchen Helpers (Lunch) </label><br>
            <input type="text" id="task_201" name="tasks_201" value="Already Filled" readonly><br>
            <input type="text" id="task_202" name="tasks_202" value="Already Filled" readonly><br>
            <input type="text" id="task_203" name="tasks_203" value="" readonly><br><br>

            <label>Empty garbage after lunch </label><br>
            <input type="text" id="task_204" name="task_204" value="" readonly><br>
            <input type="text" id="task_205" name="task_205" value="" readonly><br>
            <input type="text" id="task_206" name="task_206" value="" readonly><br><br>
           
            <label>6pm Kitchen Helpers (Dinner) </label><br>
            <input type="text" id="task_207" name="task_207" value="" readonly><br>
            <input type="text" id="task_208" name="task_208" value="" readonly><br>
            <input type="text" id="task_209" name="task_209" value="" readonly><br><br>

            <label> Cleanup after the dance </label><br>
            <input type="text" id="task_210" name="task_210" value="" readonly><br>
            <input type="text" id="task_211" name="task_211" value="" readonly><br>
            <input type="text" id="task_212" name="task_212" value="" readonly><br><br>

             <label>Empty Garbage & replenish TP (Main Floor Bathrooms)</label><br>
            <input type="text" id="task_213" name="task_213" value="" readonly><br>
            <input type="text" id="task_214" name="task_214" value="" readonly><br>
            <input type="text" id="task_215" name="task_215" value="" readonly><br>
            <input type="text" id="task_216" name="task_216" value="" readonly><br><br>

            <label>Empty Garbage & replenish TP (Upper Floor Bathrooms)</label><br>
            <input type="text" id="task_217" name="task_217" value="" readonly><br>
            <input type="text" id="task_218" name="task_218" value="" readonly><br>
            <input type="text" id="task_219" name="task_219" value="" readonly><br><br>

            <label>Empty Garbage & replenish TP (Lower Floor Bathrooms)</label><br>
            <input type="text" id="task_220" name="task_220" value="" readonly><br>
            <input type="text" id="task_221" name="task_221" value="" readonly><br>
            <input type="text" id="task_222" name="task_222" value="" readonly><br><br>
            </div>
            
          <div class="column">
          <h4> Saturday Tasks </h4>
          <label>Morning Snack Helpers</label><br>
          <input type="text" id="task_301" name="task_301" value="" readonly><br>
          <input type="text" id="task_301" name="task_301" value="" readonly><br>
          <input type="text" id="task_301" name="task_301" value="" readonly><br><br>

          <label>Kitchen Helpers (Lunch) </label><br>
          <input type="text" id="task_301" name="task_301" value="" readonly><br>
          <input type="text" id="task_302" name="task_302" value="" readonly><br>
          <input type="text" id="task_303" name="task_303" value="" readonly><br><br>

          <h4> Final Cleanup </h4>

          <label>Put Chairs and Tables Away</label><br>
          <input type="text" id="task_304" name="task_304" value="" readonly><br>
          <input type="text" id="task_305" name="task_305" value="" readonly><br>
          <input type="text" id="task_306" name="task_306" value="" readonly><br><br>

          <label>Empty Garbages</label><br>
          <input type="text" id="task_307" name="task_307" value="" readonly><br>
          <input type="text" id="task_308" name="task_308" value="" readonly><br>
          <input type="text" id="task_309" name="task_309" value="" readonly><br><br>

          <label>Load Vehicles With Conference Supplies</label><br>
          <input type="text" id="task_310" name="task_310" value="" readonly><br>
          <input type="text" id="task_311" name="task_311" value="" readonly><br><br>



 </div>
 

            <button type="button" class="volunteer"><a href="/volunteers"> Volunteer </a></button>  
            
           </div>
            </main>   

            
<script type="text/javascript" src="/library/account.js"></script>