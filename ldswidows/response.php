<?php
/*
 * Template Name: Survey
 */

/* other PHP code here */
session_start();
//var_dump($_SESSION); 
//exit; 
?>

<head>
    <meta charset="UTF_8">
    <meta name="viewport" content="width=device_width, initial_scale=1.0">
    <title>Exit Survey</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
</head>
<?php get_header();
?>

<body>


    <main id="content" class="neve_main">
        <div class="response">

            <div class="column">

                <div>
                   <h5 class="success"> <?php if(isset($_SESSION['success'])){ 
                        echo $_SESSION['success']; 
                    }?> </h5> 
                    <h2 id=register_1>WW Conference Exit Survey (March 9_11, 2023 in SLC)</h2>
                    <!__ div  is for styling purposes only __>
                    <p style="text_align: left"> Thank you for coming to the conference! We hope you enjoyed it and found it beneficial.
                        We want your feedback so we can make improvements for next year. Please fill out this survey
                        and let us know your thoughts. Your answers will be anonymous unless you choose to include your name at the bottom. </p>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }
                    ?>
                </div>
                <form action="/users/index.php" method="post">
                  <div class="thursday">
                    <p class="response"><strong>How satisfied were you with the conference overall? </strong></p><br>
                    <ul class="likert">
                        <li>
                            <input type="radio" id="1" name="satisfied" value="10" required><br><br>
                            <label for="1">1 <br>Disatisfied</label><br>
                        </li>
                        <li>
                            <input type="radio" id="2" name="satisfied" value="20"><br><br>
                            <label for="2">2 <br> Slightly Disatisfied</label><br>
                        </li>
                        <li>
                            <input type="radio" id="3" name="satisfied" value="30"><br><br>
                            <label for="3">3 <br>Neutral </label><br>
                        </li>
                        <li>
                            <input type="radio" id="4" name="satisfied" value="40"><br><br>
                            <label for="4">4<br> Slightly Satisfied</label><br>
                        </li>
                        <li>
                            <input type="radio" id="5" name="satisfied" value="50"><br><br>
                            <label for="5">5 <br>Very Satisfied</label><br>
                        </li>
                    </ul>
</div> 
                     <div class="thursday">
                     <p class="response"><strong>How relevant and useful do you think it was in helping you with the challenges of being widowed?</strong> </p><br>
                    <ul class="likert">
                        <li>
                            <input type="radio" id="1" name="relevant" value="11" required><br><br>
                            <label for="1">1 <br>Very Irrelevant</label><br>
                        </li>
                        <li>
                            <input type="radio" id="2" name="relevant" value="12"><br><br>
                            <label for="2">2 <br> Slightly Irrelevant</label><br>
                        </li>
                        <li>
                            <input type="radio" id="3" name="relevant" value="13"><br><br>
                            <label for="3">3 <br>Neutral </label><br>
                        </li>
                        <li>
                            <input type="radio" id="4" name="relevant" value="14"><br><br>
                            <label for="4">4<br> Slightly Relevant</label><br>
                        </li>
                        <li>
                            <input type="radio" id="5" name="relevant" value="15"><br><br>
                            <label for="5">5<br> Very Relevant</label><br>
                        </li>
                    </ul>
                    </div> 
                    <div class="thursday">
                        <p class="response"><label> <strong>Which of the following did you attend or do on Thursday?</strong></label></p>
                        <input type="checkbox" id="temple" name="Temple" value="code_101">
                        <label for="Temple"> Temple Session </label><br>
                        <input type="checkbox" id="pickleball" name="pickleball" value="code_102">
                        <label for="pickleball">Pickleball</label><br>
                        <input type="checkbox" id="bowling" name="bowling" value="code_103">
                        <label for="bowling"> Bowling</label><br>
                        <input type="checkbox" id="volleyball" name="volleyball" value="code_104">
                        <label for="volleyball"> Volleyball</label><br>
                        <input type="checkbox" id="craft" name="craft" value="code_105">
                        <label for="craft"> Craft</label><br>
                        <input type="checkbox" id="dance" name="dance" value="code_106">
                        <label for="dance"> Barn Dance </label><br><br>
                        <label for="thur_feedback"><strong>Do you have any specific feedback for the Thursday activities?</strong></label><br><br>
                        <textarea id="thur_feedback" name="thur_feedback"></textarea><br><br>
                    </div><br>
                    <div class="thursday">
                        <p class="response"><label> <strong>Which of the following did you attend on Friday morning?</strong></label></p>
                        <label for="Keynote_Donald_Parry"><input type="checkbox"  name="Keynote_Donald_Parry" value="code_201">Morning Keynote: Donald Parry</label><br>
                        <label for="Kent_Allen_1"> <input type="checkbox" id="Kent_Allen_1" name="Kent_Allen_1" value="code_202">Kent Allen – The Grieving Process 101</label><br>
                        <label for="Donald_Parry_Workshop"><input type="checkbox" id="Donald_Parry_Workshop" name="Donald_Parry_Workshop" value="code_203">Donald Parry Angels: Agents of Light, Love, and Power (continued with Q&A)</label><br>
                        <label for="Susie_Rose"><input type="checkbox" id="Susie_Rose" name="Susie_Rose" value="code_204">Susie Rose: Finding Strength and Miracles When Least Expected</label><br>
                        <label for="Sharon_Colyar"><input type="checkbox" id="Sharon_Colyar" name="Sharon_Colyar" value="code_205"> Sharon Colyar: Dating for Widows and Widowers</label><br>
                        <label for="Carrie_Newbie"><input type="checkbox" id="Carrie_Newbie" name="Carrie_Newbie" value="code_206">Carrie Newby: The Seasoned Widow/er Discussion Group</label><br>
                        <label for="Byron_Bair"><input type="checkbox" id="Byron_Bair" name="Byron_Bair" value="code_207"> Byron Bair: Where's My Miracle?</label><br>
                        <label for="Denise_Kimber"><input type="checkbox" id="Denise_Kimber" name="Denise_Kimber" value="code_208"> Denise Kimber: Parenting Positively Under Any Circumstances</label><br>
                        <label for="Kent_Allen_2"><input type="checkbox" id="Kent_Allen_2" name="Kent_Allen_2" value="code_209"> Kent Allen: Complicated Grief</label><br>
                        <label for="Richard_Rogers"><input type="checkbox" id="Richard_Rogers" name="Richard_Rogers" value="code_210"> Richard Rogers: Taking Control of Your Finances </label><br><br>
                        <label for="fri_am_feedback"><strong>Do you have any specific feedback for the Friday morning speakers or workshops?</strong></label><br><br>
                        <textarea id="fri_am_feedback" name="fri_am_feedback"></textarea><br><br>
                    </div><br>
                    <div class="thursday">
                        <p class="response"><label> <strong>Which of the following did you attend on Friday afternoon?</strong></label></p>
                        <label for="Kim_Scott_Killpack"><input type="checkbox" id="Kim_Scott_Killpack" name="Kim_Scott_Killpack" value="code_301">Kim & Scott_Killpack: Blending a Family with Learning, Loving, and Laughter</label><br>
                        <label for="Kent_Allen_3"><input type="checkbox" id="Kent_Allen_3" name="Kent_Allen_3" value="code_302">Kent Allen: Making New Friends</label><br>
                        <label for="Rosie_F_Ouimette"> <input type="checkbox" id="Rosie_F_Ouimette" name="Rosie_F_Ouimette" value="code_303">Rosie Ferguson Ouimette: Trusting in the Lord</label><br>
                        <label for="Esther_Reid"><input type="checkbox" id="Esther_Reid" name="Esther_Reid" value="code_304">Esther Reid: Helping Children Work Through Difficult Emotions and Develop Resilience</label><br>
                        <label for="Michelle_Lockhart"><input type="checkbox" id="Michelle_Lockhart" name="Michelle_Lockhart" value="code_305" > Michelle Lockhart: Healthy Living: Principles and Promises</label><br>
                        <label for="Scott_Wardle"><input type="checkbox" id="Scott_Wardle" name="Scott_Wardle" value="code_306"> Scott Wardle: Lazarus Time: Drawing Upon the Power of Jesus Christ in Life and in Death</label><br>
                        <label for="Rosie_F_Ouimette_2"><input type="checkbox" id="Rosie_F_Ouimette_2" name="Rosie_F_Ouimette_2" value="code_307"> Rosie Ferguson Ouimette: You Don’t Have to DIY: Gaining the Confidence to Do It Yourself and the Courage to Ask for Help</label><br>
                        <label for="Kent_Allen_4"><input type="checkbox" id="Kent_Allen_4" name="Kent_Allen_4" value="code_308"> Kent Allen: Thriving, Not Just Surviving</label><br>
                        <label for="Keynote_Calvin_Stephens"><input type="checkbox" id="Keynote_Calvin_Stephens" name="Keynote_Calvin_Stephens" value="code_309"> Afternoon Keynote: Calvin Stephens </label><br><br>
                        <label for="fri_pm_feedback"><strong>Do you have any specific feedback for the Friday afternoon speakers or workshops?</strong></label><br><br>
                        <textarea id="fri_pm_feedback" name="fri_pm_feedback"></textarea><br><br>
                    </div><br>
                    <div class="thursday">
                        <p class="response"><label> <strong>Which of the following did you attend on Saturday morning?</strong></label></p>
                        <label for="Keynote_Panel"><input type="checkbox" id="Keynote_Panel" name="Keynote_Panel" value="code_401">Morning Keynote: Kimberly Montierth, Kelly Kimber, and friends - Miracles of the WW group</label><br>
                        <label for="Kristy_Pack"><input type="checkbox" id="Kristy_Pack" name="Kristy_Pack" value="code_402">Kristy Ashworth Pack: Budgeting and Social Security Tips</label><br>
                        <label for="Kent_Allen_5"><input type="checkbox" id="Kent_Allen_5" name="Kent_Allen_5" value="code_403">Kent Allen: The Grieving Process 101</label><br>
                        <label for="Georgia_and_Jared_1"> <input type="checkbox" id="Georgia_and_Jared_1" name="Georgia_and_Jared_1" value="code_404">Georgia Allred and Jared Belcher: Marriage Is Ordained of God. So What Now?</label><br>
                        <label for="Jennie_Taylor"><input type="checkbox" id="Jennie_Taylor" name="Jennie_Taylor" value="code_405">Jennie Taylor: Juggling Widowed Life and Kids</label><br>
                        <label for="Six_Sisters"><input type="checkbox" id="Six_Sisters" name="Six_Sisters" value="code_406"> Six Sisters: Freezer Meals and Miracles</label><br>
                        <label for="Jason_Clawson"><input type="checkbox" id="Jason_Clawson" name="Jason_Clawson" value="code_407"> Jason Clawson: Discovering the Miracles, Recognizing Signs of Hope, and Inviting Joy Back into Your Life</label><br>
                        <label for="Kent_Allen_6"><input type="checkbox" id="Kent_Allen_6" name="Kent_Allen_6" value="code_408"> Kent Allen: Kids and Grief</label><br><br>
                        <label for="sat_am_feedback"><strong>Do you have any specific feedback for the Saturday morning speakers or workshops?</strong></label><br><br>
                        <textarea id="sat_am_feedback" name="sat_am_feedback"></textarea><br><br>
                    </div><br>

                    <div class="thursday">
                        <p class="response"><label> <strong>Which of the following did you attend on Saturday afternoon?</strong></label></p>
                        <label for="Camille_Winward"><input type="checkbox" id="Camille_Winward" name="sat_presenter" value="code_501">Camille Winward: Picking Up the Pieces</label><br>
                        <label for="Kent_Allen_7"><input type="checkbox" id="Kent_Allen_7" name="sat_presenter" value="code_502">Kent Allen: Red Flags of Dating</label><br>
                        <label for="Kim_Scott_Killpack"><input type="checkbox" id="Kim_Scott_Killpack" name="sat_presenter" value="code_503">Kim & Scott Killpack: Blending a Family with Learning, Loving, and Laughter</label><br>
                        <label for="Jennie_and_Kristy"> <input type="checkbox" id="Jennie_and_Kristy" name="sat_presenter" value="code_504">Jennie Taylor and Kristy Ashworth Pack: Catch the Vision: If You Can Dream It, You Can Do It</label><br>
                        <label for="Rosie_F_Ouimette_3"> <input type="checkbox" id="Rosie_F_Ouimette_3" name="sat_presenter" value="code_505">Rosie Ferguson Ouimette: Trusting in the Lord</label><br>
                        <label for="Brynn_and_Tiffany"><input type="checkbox" id="Brynn_and_Tiffany" name="sat_presenter" value="code_506"> Brynn Clinger and Tiffany Skelton: Widow Wifing 101(Bros Too!): The Importance of Finding Yourself and Your Tribe on This Crazy Adventure</label><br>
                        <label for="Kent_Allen_8"><input type="checkbox" id="Kent_Allen_8" name="sat_presenter" value="code_507"> Kent Allen: Finding Joy on Your Own</label><br>
                        <label for="Rosie_F_Ouimette_4"><input type="checkbox" id="Rosie_F_Ouimette_4" name="sat_presenter" value="code_508"> Rosie Ferguson Ouimette: You Don’t Have to DIY: Gaining the Confidence to Do It Yourself and the Courage to Ask for Help</label><br>
                        <label for="Keynote_Matt_Townsend"><input type="checkbox" id="Keynote_Matt_Townsend" name="sat_presenter" value="code_509">Afternoon Keynote_Matt_Townsend</label><br><br>
                        <label for="sat_pm_feedback"><strong>Do you have any specific feedback for the Saturday afternoon speakers or workshops?</strong></label><br><br>
                        <textarea id="sat_pm_feedback" name="sat_pm_feedback"></textarea><br><br>
                    </div><br>

                    <div style="overflow_x:auto;">
                        <table style="width: 100%;">
                            <tr class="table">
                                <th>
                                    <p class="response"><strong>How did you feel about the following things?</strong> </p>
                                </th>

                                <th>

                                    <label for="0" class="table">0 <br>Not Applicable</label><br>
                                </th>
                                <th>

                                    <label for="1" class="table">1 <br>Strongly Disagree</label><br>
                                </th>
                                <th>

                                    <label for="2" class="table">2 <br> Disagree</label><br>
                                </th>
                                <th>

                                    <label for="3" class="table">3 <br>Neutral </label><br>
                                </th>
                                <th>

                                    <label for="4" class="table">4 <br> Agree</label><br>
                                </th>
                                <th>


                                    <label for="5" class="table">5<br> Strongly Agree</label><br>
                                </th>


                            </tr>
                            <tr>
                                <th><label for="welcomed" name="welcomed">
                                        <p class="response"> I felt welcomed and at ease when I arrived</p>
                                    </label></th>
                                <td><input type="radio" id="0" name="welcomed" value="0"></td>
                                <td><input type="radio" id="1" name="welcomed" value="1"></td>
                                <td><input type="radio" id="2" name="welcomed" value="2"></td>
                                <td><input type="radio" id="3" name="welcomed" value="3"></td>
                                <td><input type="radio" id="4" name="welcomed" value="4"></td>
                                <td><input type="radio" id="5" name="welcomed" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="newFriends" name="newFriends">
                                        <p class="response"> I had a chance to make new friends and connections</p>
                                    </label></th>
                                <td><input type="radio" id="0" name="newFriends" value="0"></td>
                                <td><input type="radio" id="1" name="newFriends" value="1"></td>
                                <td><input type="radio" id="2" name="newFriends" value="2"></td>
                                <td><input type="radio" id="3" name="newFriends" value="3"></td>
                                <td><input type="radio" id="4" name="newFriends" value="4"></td>
                                <td><input type="radio" id="5" name="newFriends" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="speakersUseful" name="speakersUseful">
                                        <p class="response">The speakers and workshops were useful and relevant to me</p>
                                    </label></th>
                                <td><input type="radio" id="0" name="speakersUseful" value="0"></td>
                                <td><input type="radio" id="1" name="speakersUseful" value="1"></td>
                                <td><input type="radio" id="2" name="speakersUseful" value="2"></td>
                                <td><input type="radio" id="3" name="speakersUseful" value="3"></td>
                                <td><input type="radio" id="4" name="speakersUseful" value="4"></td>
                                <td><input type="radio" id="5" name="speakersUseful" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="venue" name="venue">
                                        <p class="response">The venue (U of U institute) worked well for the conference</p>
                                    </label></th>
                                <td><input type="radio" id="0" name="venue" value="0"></td>
                                <td><input type="radio" id="1" name="venue" value="1"></td>
                                <td><input type="radio" id="2" name="venue" value="2"></td>
                                <td><input type="radio" id="3" name="venue" value="3"></td>
                                <td><input type="radio" id="4" name="venue" value="4"></td>
                                <td><input type="radio" id="5" name="venue" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="timing" name="timing">
                                        <p class="response">The timing of the keynotes, workshops, and meals seemed about right</p>
                                    </label></th>
                                <td><input type="radio" id="0" name="timing" value="0"></td>
                                <td><input type="radio" id="1" name="timing" value="1"></td>
                                <td><input type="radio" id="2" name="timing" value="2"></td>
                                <td><input type="radio" id="3" name="timing" value="3"></td>
                                <td><input type="radio" id="4" name="timing" value="4"></td>
                                <td><input type="radio" id="5" name="timing" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="usefulWebsite" name="usefulWebsite">
                                        <p class="response">The website (www.ldswidowsandwidowers.com) was helpful to me in finding information about the conference</p>
                                    </label></th>
                                <td><input type="radio" id="0" name="usefulWebsite" value="0"></td>
                                <td><input type="radio" id="1" name="usefulWebsite" value="1"></td>
                                <td><input type="radio" id="2" name="usefulWebsite" value="2"></td>
                                <td><input type="radio" id="3" name="usefulWebsite" value="3"></td>
                                <td><input type="radio" id="4" name="usefulWebsite" value="4"></td>
                                <td><input type="radio" id="5" name="usefulWebsite" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="thur_activities" name="thur_activities">
                                        <p class="response">I enjoyed the Thursday activities (bowling, volleyball, pickleball)</p>
                                    </label></th>
                                <td><input type="radio" id="0" name="thur_activities" value="0"></td>
                                <td><input type="radio" id="1" name="thur_activities" value="1"></td>
                                <td><input type="radio" id="2" name="thur_activities" value="2"></td>
                                <td><input type="radio" id="3" name="thur_activities" value="3"></td>
                                <td><input type="radio" id="4" name="thur_activities" value="4"></td>
                                <td><input type="radio" id="5" name="thur_activities" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="barnDance" name="barnDance">
                                        <p class="response">I enjoyed the Thursday night barn dance/opening social</p>
                                    </label></th>
                                <td><input type="radio" id="0" name="barnDance" value="0"></td>
                                <td><input type="radio" id="1" name="barnDance" value="1"></td>
                                <td><input type="radio" id="2" name="barnDance" value="2"></td>
                                <td><input type="radio" id="3" name="barnDance" value="3"></td>
                                <td><input type="radio" id="4" name="barnDance" value="4"></td>
                                <td><input type="radio" id="5" name="barnDance" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="fri_dinner" name="fri_dinner">
                                        <p class="response">I enjoyed the fri_dinner progressive dinner </p>
                                    </label></th>
                                <td><input type="radio" id="0" name="fri_dinner" value="0"></td>
                                <td><input type="radio" id="1" name="fri_dinner " value="1"></td>
                                <td><input type="radio" id="2" name="fri_dinner" value="2"></td>
                                <td><input type="radio" id="3" name="fri_dinner" value="3"></td>
                                <td><input type="radio" id="4" name="fri_dinner" value="4"></td>
                                <td><input type="radio" id="5" name="fri_dinner" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="fri_dance" name="fri_dance">
                                        <p class="response">I enjoyed the fri_dinner night line dancing/karaoke/games </p>
                                    </label></th>
                                <td><input type="radio" id="0" name="fri_dance" value="0"></td>
                                <td><input type="radio" id="1" name="fri_dance" value="1"></td>
                                <td><input type="radio" id="2" name="fri_dance" value="2"></td>
                                <td><input type="radio" id="3" name="fri_dance" value="3"></td>
                                <td><input type="radio" id="4" name="fri_dance" value="4"></td>
                                <td><input type="radio" id="5" name="fri_dance" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="craft_1" name="craft_1">
                                        <p class="response">I enjoyed doing the craft project </p>
                                    </label></th>
                                <td> <input type="radio" id="0" name="craft_1" value="0"></td>
                                <td> <input type="radio" id="1" name="craft_1" value="1"></td>
                                <td><input type="radio" id="2" name="craft_1" value="2"></td>
                                <td><input type="radio" id="3" name="craft_1" value="3"></td>
                                <td><input type="radio" id="4" name="craft_1" value="4"></td>
                                <td><input type="radio" id="5" name="craft_1" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="pre_recorded" name="pre_recorded">
                                        <p class="response">I found the pre_recorded presentation on getting better sleep helpful </p>
                                    </label></th>
                                <td> <input type="radio" id="0" name="pre_recorded" value="0"></td>
                                <td> <input type="radio" id="1" name="pre_recorded" value="1"></td>
                                <td><input type="radio" id="2" name="pre_recorded" value="2"></td>
                                <td><input type="radio" id="3" name="pre_recorded" value="3"></td>
                                <td><input type="radio" id="4" name="pre_recorded" value="4"></td>
                                <td><input type="radio" id="5" name="pre_recorded" value="5"></td>
                            </tr>
                            <tr>
                                <th><label for="come_and_go" name="come_and_go">
                                        <p class="response">I found the Come and Go Room useful for relaxing, taking breaks, etc.</p>
                                    </label></th>
                                <td> <input type="radio" id="0" name="come_and_got" value="0"></td>
                                <td> <input type="radio" id="1" name="come_and_go" value="1"></td>
                                <td><input type="radio" id="2" name="come_and_go" value="2"></td>
                                <td><input type="radio" id="3" name="come_and_go" value="3"></td>
                                <td><input type="radio" id="4" name="come_and_go" value="4"></td>
                                <td><input type="radio" id="5" name="come_and_go" value="5"></td>
                            </tr>


                        </table>
                    </div>
                    <div class="thursday">
                        <label for="learn"><strong>We're so glad you came! Hopefully the conference was worth your time. Did you learn or participate in anything in particular that will be helpful to you going forward? If so, please tell us what that was.</strong></label><br><br>
                        <textarea id="learn" name="learn"></textarea><br><br>
                    </div><br>
                    <div class="thursday">
                        <label for="general"><strong>Do you have any other feedback about the conference in general? What did you enjoy? What would you like to see again? What would you change?</strong></label><br><br>
                        <textarea id="general" name="general"></textarea><br><br>
                    </div><br>
                    <div class="thursday">
                        <label for="suggestions"><strong>Do you have suggestions for future conferences? (speakers, presenters, topics, activities, etc.)</strong></label><br><br>
                        <textarea id="suggestions" name="suggestions"></textarea><br><br>
                    </div><br>
                    <div class="thursday">
                        <label for="utilize"><strong>Do you have any skills, talents, or connections that you think we could utilize to help with with the conference next year? Or just an interest in volunteering? If so, please explain and include your name and number.</strong></label><br><br>
                        <textarea id="utilize" name="utilize"></textarea><br><br>
                    </div><br>
                    <div class="thursday">
                        <label for="thoughts"><strong>Any additional thoughts?</strong></label><br><br>
                        <textarea id="thoughts" name="thoughts"></textarea><br><br>
                    </div><br>

                    <div class="thursday">
                        <label for="age"> <strong>Age: </strong></label><br>
                        <select name="age" id="age" required>
                            <option value="">__Please choose an option__</option>
                            <option value="20_29"> 20-29 </option>
                            <option value="30_39"> 30-39 </option>
                            <option value="40_49"> 40-49 </option>
                            <option value="50_59"> 50-59 </option>
                            <option value="60_69"> 60-69 </option>
                            <option value="70+"> 70+ </option>
                        </select> <br> <br>
                         <p> *Required </p> 
                    </div> <br>
                    <div class="thursday">
                        <p class="response"><strong>If you want your responses to remain anonymous leave the name field blank.</strong> </p>
                        <label>First Name:<input type="text" name="firstName" class="input" /></label>
                        <label>Last Name:<input type="text" class="input" name="lastName" /></label><br>
                    </div> <br>
<div class="thursday">
                    <input type="submit" id="submit" value="Submit Survey"/><br><br>
                    <!__Add the action name _ value pair __>
                    <input type="hidden" name="action" value="survey">
</div>
                </form>
            </div>
        </div>

    </main>
    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
</body>