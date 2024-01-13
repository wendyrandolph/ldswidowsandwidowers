function idleLogout() {
var last_activity; 
var loggedin; 
var time; 
var logoutTime; 
var sec = logoutTime * 1000; 
var logout = (time - last_activity);  
var t; 

    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer;  // catches touchscreen presses as well      
    window.ontouchstart = resetTimer; // catches touchscreen swipes as well      
    window.ontouchmove = resetTimer;  // required by some devices 
    window.onclick = resetTimer;      // catches touchpad clicks as well
    window.onkeydown = resetTimer;   
    window.addEventListener('scroll', resetTimer, true); // improved; see comments


    function yourFunction() {
        // your function for too long inactivity goes here
         
         location.href = 'https://ldswidowsandwidowers.com/';
           var message = "You have been logged out, for inactivity.";   
           var messageDiv = document.getElementById("logout"); 
          
           messageDiv.innerHTML = message; 
           messageDiv.style.display = "block";  
            setTimeout(function(){
        messageDiv.style.display = "none";    
    }, 5000);
          console.log(logout);
            
          }  
    

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(yourFunction, sec);  // time is in milliseconds
    } 
       
} 



function limitFunc() {

  let alltopics = document.querySelectorAll('.topic');
  let total = 0;

  for (let count = 0; count < alltopics.length; count++) {
    if (alltopics[count].checked == true) {
      total += 1;
    }
  }
  if (total > 3) {
    document.querySelector('#invalid').innerText = "**You can only choose 3 topics.**";
    return false;
  }
  else {
    document.querySelector('#invalid').innerText = " ";
  }
}





function limitMeal() {
  console.log("This is the limitMeal");
  let lunchSat = document.querySelectorAll('.meal2');
  let total = 0;

  for (let count = 0; count < lunchSat.length; count++) {
    if (lunchSat[count].checked == true) {
      total += 1;
    }
  }
  if (total > 1) {
    document.querySelector('#invalid2').innerText = "**You can only choose 1 option.**";
    return false;
  }
  else {
    document.querySelector('#invalid2').innerText = " ";
  }
}

function limitDinnerFunct() {
  let dinnerSat = document.querySelectorAll('.meal3');
  let total = 0;

  for (let count = 0; count < dinnerSat.length; count++) {
    if (dinnerSat[count].checked == true) {
      total += 1;
    }
  }
  if (total > 1) {
    document.querySelector('#invalid3').innerText = "**You can only choose 1 option.**";
    return false;
  }
  else {
    document.querySelector('#invalid3').innerText = " ";
  }
}


function limitTopic() {

  let alltopics = document.querySelectorAll('.topic');
  var count = document.querySelectorAll('input[type="checkbox"]:checked').length;
  var total = count;
  for (let i = total; i < alltopics.length; i++) {
    if (alltopics.checked == true) {
      total += 1;
    }

    if (count > 3) {
      document.querySelector('#invalid').innerText = "**You can only choose 3 topics.**";
      return false;
    } else {
      document.querySelector('#invalid').innerText = " ";
    }
  }
}





/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}





