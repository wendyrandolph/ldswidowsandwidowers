    <li class="grid-2">   
         <label class="column-1" ><strong>First Name: </strong><br>
            <input type="text" name="firstName" class="column-1 rounded-input full-width" id="firstName" placeholder="New First Name" required <?php if (isset($firstName)) {
                                                                                                                        echo "value = '$firstName'";
                                                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                                                        echo 'value="' . $_SESSION['clientData']['firstName'] . '" ';
                                                                                                                    } ?>> <br>
                                                                                                                    </label>
            <label class="column-2"><strong>Last name: </strong><br> 
            <input type="text" name="lastName" class="column-2 rounded-input full-width" id="lastName" placeholder="New Last Name" required <?php if (isset($lastName)) {
                                                                                                                    echo "value = '$lastName'";
                                                                                                                } elseif (isset($_SESSION['clientData'])) {
                                                                                                                    echo 'value="' . $_SESSION['clientData']['lastName'] . '" ';
             
                                                                                                     } ?>><br>
                    </label></li>  
          <li class="grid-2">  
          <label class="column-4"><strong>Email:</strong><br>
            <input type="email" name="userEmail" class="rounded-input full-width" id="userEmail" placeholder="New User Email" required <?php if (isset($userEmail)) {
                                                                                                                        echo "value = '$userEmail'";
                                                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                                                        echo 'value="' . $_SESSION['clientData']['userEmail'] . '" ';
                                                                                                                    } ?>> <br>
            </label> </li>
            <li class="grid-2"> 
            <label class="column-1" ><strong>Address:</strong><br>
            <input type="text" name="address" class="rounded-input full-width"  id="address" placeholder="New Home Address" required <?php if (isset($address)) {
                                                                                                                        echo "value = '$address'";
                                                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                                                        echo 'value="' . $_SESSION['clientData']['address'] . '" ';
                                                                                                                          } ?>> <br>
        </label>
            <label class="column-2"><strong>City:</strong> <br>
            <input type="text" name="city" class="rounded-input full-width" id="city" required <?php if (isset($city)) {
                                                                                echo "value = '$city'";
                                                                            } elseif (isset($_SESSION['clientData'])) {
                                                                                echo 'value="' . $_SESSION['clientData']['city'] . '" ';
                                                                            } ?>> <br>
         </label> </li>
         <li class="grid-2">   
         
         <label for="state" ><strong>State:</strong> <br>
            <select name="state" id="state" class="rounded-input full-width">
                <option value=<?php if (isset($_SESSION['clientData'])) {
                                    echo $_SESSION['clientData']['state'];
                                } ?>> <?php echo $_SESSION['clientData']['state'] ?></option>
                <option value="Alabama">Alabama</option>
                <option value="Alaska">Alaska</option>
                <option value="Arizona">Arizona</option>
                <option value="Arkansas"> Arkansas</option>
                <option value="California">California</option>
                <option value="Colorado">Colorado</option>
                <option value="Connecticut">Connecticut</option>
                <option value="Delaware">Delaware</option>
                <option value="Florida">Florida</option>
                <option value="Georgia">Georgia</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Idaho">Idaho</option>
                <option value="Illinois">Illinois</option>
                <option value="Indiana">Indiana</option>
                <option value="Iowa">Iowa</option>
                <option value="Kansas">Kansas</option>
                <option value="Kentucky">Kentucky</option>
                <option value="Louisiana">Louisiana</option>
                <option value="Maine">Maine</option>
                <option value="Maryland">Maryland</option>
                <option value="Massachusetts">Massachusetts</option>
                <option value="Michigan">Michigan</option>
                <option value="Minnesota">Minnesota</option>
                <option value="Mississippi">Mississippi</option>
                <option value="Missouri">Missouri</option>
                <option value="Montana">Montana</option>
                <option value="Nebraska">Nebraska</option>
                <option value="Nevada">Nevada</option>
                <option value="New Hampshire">New Hampshire</option>
                <option value="New Jersey">New Jersey</option>
                <option value="New Mexico">New Mexico</option>
                <option value="New York">New York</option>
                <option value="North Carolina">North Carolina</option>
                <option value="North Dakota">North Dakota</option>
                <option value="Ohio">Ohio</option>
                <option value="Oklahoma">Oklahoma</option>
                <option value="Oregon">Oregon</option>
                <option value="Pennsylvania">Pennsylvania</option>
                <option value="Rhode Island">Rhode Island</option>
                <option value="South Carolina">South Carolina</option>
                <option value="South Dakota">South Dakota</option>
                <option value="Tennessee">Tennessee</option>
                <option value="Texas">Texas</option>
                <option value="Utah">Utah</option>
                <option value="Vermont">Vermont</option>
                <option value="Virginia">Virginia</option>
                <option value="Washington">Washington</option>
                <option value="West Virginia">West Virginia</option>
                <option value="Wisconsin">Wisconsin</option>
                <option value="Wyoming">Wyoming</option>
                <option value="Other">Other (Outside the US)</option>
            </select><br><br>
        </label> 
     
            <label for="county" id="county1"><strong>County</strong><br>
                <select name="county" id="county" class="rounded-input full-width" required>
                <option value=<?php if (isset($_SESSION['clientData'])) {
                                    echo $_SESSION['clientData']['county'];
                                } ?>><?php echo $_SESSION['clientData']['county']?></option>
                    <option value=" "> </option>
                    <option value="Beaver">Beaver</option>
                    <option value="Box Elder">Box Elder</option>
                    <option value="Cache">Cache</option>
                    <option value="Carbon">Carbon</option>
                    <option value="Daggett">Daggett</option>
                    <option value="Davis">Davis</option>
                    <option value="Duchesne">Duchesne</option>
                    <option value="Emery">Emery</option>
                    <option value="Garfield">Garfield</option>
                    <option value="Grand">Grand</option>
                    <option value="Iron">Iron</option>
                    <option value="Juab">Juab</option>
                    <option value="Kane">Kane</option>
                    <option value="Millard">Millard</option>
                    <option value="Morgan">Morgan</option>
                    <option value="Piute">Piute</option>
                    <option value="Rich">Rich</option>
                    <option value="Salt Lake">Salt Lake</option>
                    <option value="San Juan">San Juan</option>
                    <option value="Sanpete">Sanpete</option>
                    <option value="Sevier">Sevier</option>
                    <option value="Summit">Summit</option>
                    <option value="Tooele">Tooele</option>
                    <option value="Uintah">Uintah</option>
                    <option value="Utah">Utah</option>
                    <option value="Wasatch">Wasatch</option>
                    <option value="Washington">Washington</option>
                    <option value="Wayne">Wayne</option>
                    <option value="Weber">Weber</option>
                </select><br><br>
          </label> 
  <label for="country" id="country1"><strong>Country, if you live outside the US: </strong><br>
            <input type="text" name="country" class="rounded-input column-2 full-width" id="country" placeholder="New Country" <?php if (isset($country)) {
                                                                                                        echo "value = '$country'";
                                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                                        echo 'value="' . $_SESSION['clientData']['country'] . '" ';
                                                                                                    } ?>><br><br>
   </label>
    </li>                                                                                                  




<div class="grid-2"> 
            <label id="zipcode"><strong>Zipcode:</strong><br>
            <input type="text" name="zipcode" class="rounded-input column-1 full-width"  <?php if (isset($zipcode)) {
                                                                                echo "value = '$zipcode'";
                                                                            } elseif (isset($_SESSION['clientData'])) {
                                                                                echo 'value="' . $_SESSION['clientData']['zipcode'] . '" ';
                                                                            } ?>> <br>
            </label> 


           



            <label class="column-2"><strong>Phone:</strong><br>
            <input type="tel" name="phone" class="rounded-input full-width" id="phone" placeholder="New phone number" <?php if (isset($phone)) {
                                                                                                        echo "value = '$phone'";
                                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                                        echo 'value="' . $_SESSION['clientData']['phone'] . '" ';
                                                                                                    } ?>><br>

            
            </label> 
            </div>
      <div class="grid-2">  
      <label id="gender" class="column-1 full-width"><strong>Gender: </strong> <br>
         <label for="male" class="gender t-center "> Male<input type="radio" id="male" name="gender" value="Male" <?php echo ($_SESSION['clientData']['gender'] == "Male" ? 'checked="checked"' : ''); ?>>
             </label>
           <label for="female" class="gender t-center">Female <input type="radio" id="female" name="gender" value="Female" <?php echo ($_SESSION['clientData']['gender'] == "Female" ? 'checked="checked"' : ''); ?>>
            </label>       
        </label>

            <label class="column-2">Age:  <br>
            <select name="age" id="age"  class="rounded-input full-width" required><br>
                <option value="<?php if (isset($_SESSION['clientData'])) {
                                    echo $_SESSION['clientData']['age'];
                                } ?>"> <?php echo $_SESSION['clientData']['age'] ?></option>
                <option value="20-29"> 20-29 </option>
                <option value="30-39"> 30-39 </option>
                <option value="40-49"> 40-49 </option>
                <option value="50-59"> 50-59 </option>
                <option value="60-69"> 60-69 </option>
                <option value="70+"> 70+ </option>
            </select> <br> <br>
</label>
</div>


           <div class="grid-2"> 
            <label for="widowed">How long have you been widowed?
            <select name="widowed" id="widowed" class="rounded-input full-width"><br><br>
                <option value="<?php if (isset($_SESSION['clientData'])) {
                                    echo $_SESSION['clientData']['widowed'];
                                } ?>"> <?php echo $_SESSION['clientData']['widowed'] ?></option>
                <option value="0-6 Months">0-6 Months</option>
                <option value="6-12 Months">6-12 Months</option>
                <option value="1-2 Years">1-2 Years </option>
                <option value="2-3 Years">2-3 Years </option>
                <option value="3-5 Years">3-5 Years </option>
                <option value="5-7 Years">5-7 Years</option>
                <option value="8 years or more">8 years or more </option>
                <option value="Not widowed myself"> Not widowed myself</option>
            </select> 
</label>
            <label for="conf"> How many conferences have you attended? <br>
            <select name="conf" id="conf" class="rounded-input full-width">
                <option value="<?php if (isset($_SESSION['clientData'])) {
                                    echo $_SESSION['clientData']['conf'];
                                } ?>"><?php echo $_SESSION['clientData']['conf'] ?> </option>
                <option value="This will be my first"> This will be my first </option>
                <option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4 or more"> 4 or more </option>
            </select>
</label>
</div>
<br>