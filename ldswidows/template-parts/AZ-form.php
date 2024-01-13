<?php

//Grab the Arizona Registration Details for the user:
$_SESSION['getRegDataAZ'];
//var_dump($_SESSION['getRegDataAZ']); 
//exit; 
$act_1 = $_SESSION['getRegDataAZ'][0]['act_1'];
$act_2 = $_SESSION['getRegDataAZ'][0]['act_2'];
//$act_3 = $_SESSION['getRegDataAZ'][0]['act_3'];
//$act_4 = $_SESSION['getRegDataAZ'][0]['act_4'];
$act_5 = $_SESSION['getRegDataAZ'][0]['act_5'];
$keynote_1 = $_SESSION['getRegDataAZ'][0]['keynote_1'];
$meal_1 = $_SESSION['getRegDataAZ'][0]['meal_1'];
$confId = $_SESSION['getRegDataAZ'][0]['conf_id'];
$userId = $_SESSION['getRegDataAZ'][0]['userId'];
$emergencyName = $_SESSION['getRegDataAZ'][0]['emergencyName'];
$emergencyPhone = $_SESSION['getRegDataAZ'][0]['emergencyPhone'];
?>


<br> 
<header class="question">Activities  </header> <br>
Here are a list of several possible activities for Friday, November 3rd, 2023, please indicate which ones you are planning to or interested in participating?  <br><br> 
** We have updated/changed some of the questions from when you first registered, you may need to update your response to reflect these changes. 

<li class="grid-3">
<label class="column-1 full-width" for="act_5"><strong> Temple Session on Friday - November 3rd  </strong> <br>
<select name="act_5" id="act_5" class="input" required>
        <option value=<?php if (isset($act_5)) {
                                    echo $act_5;
                                } ?>> <?php if (isset($act_5)) {
                                    echo $act_5;
                                } else { 
                                        echo "Please Select an Option";
                                } ?></option>
        <option value="Gilbert Temple - 8:00am" >Gilbert Temple @ 8:00am</option>
        <option value="Mesa Temple - 8:30am" >Mesa Temple @8:30am</option>
        <option value="Not Attending" >Not Attending, thank you.</option>
</select>
</label>
</li>
<hr>
<li class="grid-2"> 
<label class="column-1 full-width" for="act_1"><strong>Wind Caves Hike at Usery Mtn Regional Park</strong><br>
<select name="act_1" id="act_1" class="input" required>
        <option value=<?php if (isset($act_1)) {
                                    echo $act_1;
                                } ?>> <?php if (isset($act_1)) {
                                    echo $act_1;
                                } else { 
                                        echo "Please Select an Option";
                                }?></option>
        <option value="2:30pm - Wind Caves" >2:30pm - Wind Caves</option>
        <option value="3:00pm - Wind Caves" >3:00pm - Wind Caves</option>
        <option value="Not Attending" >Not Attending, thank you.</option>
</select>
</label>


<label class="column-2 full-width" for="act_2"><strong> Riparian Preserve (Nice flat walk)</strong><br>

** We have replaced the Hieroglyphic Trail with this, you may need to update your response to reflect this change. 
<select name="act_2" id="act_2" class="input" required>
        <option value=<?php if (isset($act_2)) {
                                    echo $act_2;
                                } ?>> <?php if (isset($act_2)) {
                                    echo $act_2;
                                } else { 
                                        echo "Please Select an Option";
                                }?></option>
        <option value="Riparian Preserve at 8:30am" >Riparian Preserve at 8:30am</option>
        <option value="Riparian Preserve at 11:00am" >Riparian Preserve at 11:00am</option>
        <option value="Not Attending" >Not Attending, thank you.</option>
</select>
</label>
</li><br>
<header class="question"> Meals  </header> <br>
<label for="meal_1"> Friday BBQ Dinner & dessert at Usery Mtn Regional Park starting at 3:00pm, will you be there? <br><br>
<strong>Description: </strong> Dessert is around a fire pit, please bring a camp chair.</label> <br><br>
<label class="gender t-center">Yes<input type="radio" name="meal_1" value="Yes" required <?php echo ($meal_1 == "Yes" ? 'checked="checked"' : ''); ?>></label>
<label class="gender t-center">No<input type="radio" name="meal_1" value="No" <?php echo ($meal_1 == "No" ? 'checked="checked"' : ''); ?>> </label> <br><br>
<p class="t left">** Lunch & Dinner will be provided on Saturday. </p> <br><br>



<header class="question">Keynotes & Workshops on Saturday </header> <br>
<label for="keynote_1"><strong>Do you plan to attend the workshops and keynotes on Saturday? </strong> <br>
<label class="gender t-center">Yes<input type="radio" name="keynote_1" value="Yes" required <?php echo ($keynote_1 == "Yes" ? 'checked="checked"' : ''); ?>></label>
<label class="gender t-center">No<input type="radio" name="keynote_1" value="No" <?php echo ($keynote_1 == "No" ? 'checked="checked"' : ''); ?>></label>
</label>
<br><br>



<header class="question"> Other Info  </header> <br><br>
 <p class="t-left"><strong> In case of emergency, please provide: </strong> </p>
<div class="grid-2 full-width">

    <label for="emergencyName"> Emergency Contact Person: <br><br>
        <input type="text" name="emergencyName" class="rounded-input column-1 full-width" id="emergencyName" placeholder="Emergency Contact Name" required <?php if (isset($emergencyName)) {
                                                                                                                                                                echo "value = '$emergencyName'";
                                                                                                                                                            } ?>> <br></label>

    <label for="emergencyPhone"> Emergency Contact Phone Number: <br><br>
        <input type="phone" name="emergencyPhone" class="rounded-input column-1 full-width" id="emergencyPhone" placeholder="Emergency Contact Phone #" required <?php if (isset($emergencyPhone)) {
                                                                                                                                                                        echo "value = '$emergencyPhone'";
                                                                                                                                                                    } ?>><br></label>

</div>
<br><br>

<hr>