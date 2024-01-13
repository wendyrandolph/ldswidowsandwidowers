<?php
$_SESSION['getRegDataSA'];
//var_dump($_SESSION['getRegDataSA']); 
//exit; 
$act_1 = $_SESSION['getRegDataSA'][0]['act_1'];
$act_2 = $_SESSION['getRegDataSA'][0]['act_2'];
$act_3 = $_SESSION['getRegDataSA'][0]['act_3'];
$act_4 = $_SESSION['getRegDataSA'][0]['act_4'];
$act_5 = $_SESSION['getRegDataSA'][0]['act_5'];
$act_6 = $_SESSION['getRegDataSA'][0]['act_6'];
$act_7 = $_SESSION['getRegDataSA'][0]['act_7'];

$meal_1 = $_SESSION['getRegDataSA'][0]['meal_1'];
$meal_2  = $_SESSION['getRegDataSA'][0]['meal_2'];
$workshop_1 = $_SESSION['getRegDataSA'][0]['workshop_1'];
$workshop_2 = $_SESSION['getRegDataSA'][0]['workshop_2'];
$workshop_3 = $_SESSION['getRegDataSA'][0]['workshop_3'];
$workshop_4 = $_SESSION['getRegDataSA'][0]['workshop_4'];
$workshop_5 = $_SESSION['getRegDataSA'][0]['workshop_5'];
$workshop_6 = $_SESSION['getRegDataSA'][0]['workshop_6'];
$keynote_1 = $_SESSION['getRegDataSA'][0]['keynote_1'];
$keynote_2 = $_SESSION['getRegDataSA'][0]['keynote_2'];
$church = $_SESSION['getRegDataSA'][0]['church'];
$confId = $_SESSION['getRegDataSA'][0]['conf_id'];
$userId = $_SESSION['getRegDataSA'][0]['user_id'];
$emergencyName = $_SESSION['getRegDataSA'][0]['emergencyName'];
$emergencyPhone = $_SESSION['getRegDataSA'][0]['emergencyPhone'];
$foodNeeds = $_SESSION['getRegDataSA'][0]['foodNeeds'];


?>
<br>
<header class="question">Activities </header> <br>
Friday before the fireside is free-form, so please enjoy your time here in beautiful San Antonio!
We’ve lined up some possible gathering spots to meet other widows, make friends,
and see some of our iconic landmarks. Join us for any, all, or none, at your leisure.
<br><br>
<li class="grid-3">
    <label class="column-1 full-width" for="act_1"><strong>Which Friday morning activity are you interested in doing?</strong>
        **By selecting one of these you are not committed, we just want to see what kind of interest there is.<br>
        <select name="act_1" id="act_1" class="rounded-input" required>
            <option value="<?php if (isset($act_1)) echo $act_1; ?>" selected><?php echo $act_1 ?></option>
            <option value="Hike">Hike </option>
            <option value="Temple">Temple Session at the San Antonio Temple.</option>
        </select>
    </label>
</li><br>

<div class="column-1 full-width" style="list-style: none; background-color: #FA8072; padding: 10px; ">
    We are making you aware of several possible activities for the afternoon.

    <li><strong> Narrated Riverwalk Cruise - </strong> $14.50 Meet at the Rivercenter Ticket Booth </li>
    <li><strong> Visit El Mercado - </strong> Historic Market Square </li>
    <li><strong> Hike @ Government Canyon </strong> </li>

</div> <br>

<div class="grid-2">
    <div class="column-1">
        <label class="full-width" for="act_2"><strong> Which Friday Afternoon Activity @ 2pm are you interested in? </strong> <br><br>

            <select name="act_2" id="act_2" class="rounded-input" required>
                <option value="<?php if (isset($act_2)) echo $act_2; ?>" selected><?php echo $act_2 ?></option>
                <option value="Temple">Temple Session at the San Antonio Temple.</option>
                <option value="Hike">Hike</option>
                <option value="Not Attending, thank you.">Not Attending, thank you.</option>
            </select><br><br>
        </label>
    </div>
    <div class="column-2">
        <label for="act_3" class="full-width"><strong> Do you plan to attend the Narrated Riverwalk Cruise @ 3pm? </strong> <br><br>
            <span class="gender t-center full-width" style="margin-right: 10px">Yes<input type="radio" name="act_3" value="Yes" required <?php echo ($act_3 == "Yes" ? 'checked="checked"' : ''); ?>></span>
                <span class="gender t-center full-width" style="margin-right: 10px">No<input type="radio" name="act_3" value="No" <?php echo ($act_3 == "No" ? 'checked="checked"' : ''); ?>></span>
                </label>
    </div>
</div>
<hr>
<div class="grid-2 full-width">
    <div class="column-1">
        <label for="act_4" class="column-1 full-width"><strong> Do you plan to visit El Mercado with us @ 4pm? </strong> <br><br>
            <span class="gender t-center full-width">Yes<input type="radio" name="act_4" value="Yes" required <?php echo ($act_4 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="act_4" value="No" <?php echo ($act_4 == "No" ? 'checked="checked"' : ''); ?>></span><br><br>
        </label>
    </div>
    <div class="column-2">
        <label for="act_5" class="column-2 full-width"><strong> “Fast Friends” Treats & Social and Friendship Games - Friday 8:15pm - 9:30pm?</strong> <br><br>
            <span class="gender t-center full-width">Yes<input type="radio" name="act_5" value="Yes" required <?php echo ($act_5 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="act_5" value="No" <?php echo ($act_5 == "No" ? 'checked="checked"' : ''); ?>></span>
        </label>
    </div>
</div>
<hr>

<div class="grid-2">
    <div class="column-1">
        <label for="act_6" class="column-1 full-width"><strong> Texas Under the Stars - Saturday 8:15pm - 10:00pm?</strong> <br>
            Texas Under The Stars – Outside – S’mores Round the Fire, Guitars and Campfire songs, Yard Games (horseshoes, cornhole, Kan Jam, KUB)<br>
            Inside - table games <br><br>
            <span class="gender t-center full-width">Yes<input type="radio" name="act_6" value="Yes" required <?php echo ($act_6 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="act_6" value="No" <?php echo ($act_6 == "No" ? 'checked="checked"' : ''); ?>></span><br><br>
        </label>
    </div>
    <div class="column-2">
        <label for="act_7" class="column-2 full-width"><strong> Guitars and Campfire Songs: </strong></br>
            We're hoping to have someone bring their guitar to play around the campfire, do you have one that you would be willing to bring and play for us? <br><br>
            <span class="gender t-center full-width">Yes<input type="radio" name="act_7" value="Yes" required <?php echo ($act_7 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="act_7" value="No" <?php echo ($act_7 == "No" ? 'checked="checked"' : ''); ?>></span>
        </label><br>
    </div>
</div>
<hr>
<header class="question"> Meals </header> <br>
<div class="grid-2">

    <label for="meal1"> Saturday Lunch @ 12:40pm - 1:30pm <br>
        <strong>Description: </strong> Deli Lunch in the Cultural Hall <br><br>
        <select name="meal1" id="meal1" class="rounded-input column-1 full-width" required>
            <option value="<?php if (isset($meal_1)) echo $meal_1; ?>" selected><?php echo $meal_1 ?></option>
            <option value="Yes, thank you.">Yes, thank you.</option>
            <option value="No, thank you.">No, thank you.</option>
        </select>
    </label>


    <label for="meal2"> Saturday Dinner @ 5:00pm - 6:45pm <br>
        <strong>Description: </strong>Texas BBQ Dinner in the Cultural Hall<br><br>
        <select name="meal2" id="meal2" class="rounded-input full-width" required>
            <option value="<?php if (isset($meal_2)) echo $meal_2; ?>" selected><?php echo $meal_2 ?></option>
            <option value="Yes, thank you.">Yes, thank you.</option>
            <option value="No, thank you.">No, thank you.</option>
        </select>
    </label>

</div>
<hr>
<header class="question"> Other Info </header> <br><br>
<div class="grid-2">
    <label>Any Special Food Needs? <br>
        <input type="text" name="foodNeeds" class="rounded-input column-1 full-width" id="foodNeeds" placeholder="Food Needs" required <?php if (isset($foodNeeds)) {
                                                                                                                                            echo "value = '$foodNeeds'";
                                                                                                                                        } ?>><br></label>
</div>
<hr>
<p class="t-left"><strong> In case of emergency, please provide: </strong> </p>
<div class="grid-2">

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
<header class="question">Keynotes & Workshops </header> <br>
<?php
$workshop1_time_SA = "9:40am - 10:30am";
$workshop2_time_SA = "10:45am - 11:35am";
$workshop3_time_SA = "11:50am - 12:40pm";
$workshop4_time_SA = "1:35pm - 2:25pm";
$workshop5_time_SA = "2:40pm - 3:30pm";
$workshop6_time_SA = "3:45pm - 4:35pm";
$keynote_time_SA = "7:00pm - 8:00pm";
?>
<p> Which sessions will you be attending?<br>
    ** Please Note that each workshop session will have multiple classes to choose from.** </p><br><br>


<div class="grid-2">
    <div class="column-1">
        <label for="keynote_1" class="column-1 full-width"><strong> Friday Evening Fireside </strong> -<?php echo $keynote_time_SA; ?><br><br>
            <span class="gender t-center full-width">Yes<input type="radio" name="keynote_1" value="Yes" required <?php echo ($keynote_1 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="keynote_1" value="No" <?php echo ($keynote_1 == "No" ? 'checked="checked"' : ''); ?>></span><br><br>
        </label>
    </div>
    <div class="column-2">
        <label for="workshop_1" class="column-2 full-width"><strong> Workshop 1 </strong> - <?php echo $workshop1_time_SA; ?> <br><br>
            <span class="gender t-center full-width">Yes<input type="radio" class="workshop" name="workshop_1" value="Yes" required <?php echo ($workshop_1 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="workshop_1" value="No" <?php echo ($workshop_1 == "No" ? 'checked="checked"' : ''); ?>></span>
        </label>
    </div>
</div>
<hr>
<div class="grid-2">
    <div class="column-1">
        <label for="workshop_2" class="column-1 full-width"><strong> Workshop 2</strong> - <?php echo $workshop2_time_SA; ?> <br><br>
            <span class="gender t-center full-width">Yes<input type="radio" class="workshop" name="workshop_2" value="Yes" required <?php echo ($workshop_2 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="workshop_2" value="No" <?php echo ($workshop_2 == "No" ? 'checked="checked"' : ''); ?>></span><br><br>
        </label>
    </div>
    <div class="column-2">
        <label for="workshop_3" class="column-2 full-width"><strong> Workshop 3 </strong> - <?php echo $workshop3_time_SA; ?> <br><br>
            <span class="gender t-center full-width">Yes<input type="radio" class="workshop" name="workshop_3" value="Yes" required <?php echo ($workshop_3 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="workshop_3" value="No" <?php echo ($workshop_3 == "No" ? 'checked="checked"' : ''); ?>></span>
        </label>
    </div>
</div>
<hr>
<div class="grid-2">
    <div class="column-1">
        <label for="workshop_4" class="column-1 full-width"><strong> Workshop 4</strong> - <?php echo $workshop4_time_SA; ?> <br><br>
            <span class="gender t-center full-width">Yes<input type="radio" class="workshop" name="workshop_4" value="Yes" required <?php echo ($workshop_4 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="workshop_4" value="No" <?php echo ($workshop_4 == "No" ? 'checked="checked"' : ''); ?>></span><br><br>
        </label>
    </div>
    <div class="column-2">
        <label for="workshop_5" class="column-2 full-width"><strong> Workshop 5 </strong> - <?php echo $workshop5_time_SA; ?><br><br>
            <span class="gender t-center full-width">Yes<input type="radio" class="workshop" name="workshop_5" value="Yes" required <?php echo ($workshop_5 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="workshop_5" value="No" <?php echo ($workshop_5 == "No" ? 'checked="checked"' : ''); ?>></span>
        </label>
    </div>
</div>
<hr>
<div class="grid-2">
    <div class="column-1">
        <label for="workshop_6" class="column-1 full-width"><strong> Workshop 6</strong> - <?php echo $workshop6_time_SA; ?><br><br>
            <span class="gender t-center full-width">Yes<input type="radio" class="workshop" name="workshop_6" value="Yes" required <?php echo ($workshop_6 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" name="workshop_6" value="No" <?php echo ($workshop_6 == "No" ? 'checked="checked"' : ''); ?>></span><br><br>
        </label>
    </div>
    <div class="column-2">
        <label for="keynote_2" class="column-2 full-width"><strong> Saturday Closing Keynote </strong> -<?php echo $keynote_time_SA; ?><br><br>
            <span class="gender t-center full-width">Yes<input type="radio" class="workshop" name="keynote_2" value="Yes" required <?php echo ($keynote_2 == "Yes" ? 'checked="checked"' : ''); ?>></span>
            <span class="gender t-center full-width">No<input type="radio" class="workshop" name="keynote_2" value="No" required <?php echo ($keynote_2 == "No" ? 'checked="checked"' : ''); ?>></span>
        </label>
    </div>
</div>
<hr>



**If approved **<br><br>
<label for="church" class="column-1 full-width"><strong> Will you be attending our special Testimony meeting on Sunday? </strong> -<?php echo $keynote_time_SA; ?></label><br><br>
<div class="formUpdate">
    <span class="gender t-center full-width">Yes<input type="radio" name="church" value="Yes" required <?php echo ($church == "Yes" ? 'checked="checked"' : ''); ?>></span>
    <span class="gender t-center full-width">No<input type="radio" name="church" value="No" <?php echo ($church == "No" ? 'checked="checked"' : ''); ?>></span>
</div> <br><br>