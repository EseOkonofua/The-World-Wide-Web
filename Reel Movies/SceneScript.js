
function showMovies(){
    var xmlhttp;
    var value = document.getElementById("movieGenre").value;
    var movieError = document.getElementById("movieError");
    var moviePOPUP = document.getElementById("movieByGenre");
    if (value == ""){
        movieError.innerHTML = "Must select a genre!";
    }
    else{
        movieError.innerHTML = "";
        document.getElementById("moviePopUpHeader").innerHTML = "";
        document.getElementById("moviePopUpHeader").innerHTML = value + " Movies  <input type='button' class ='exitButton' onclick = 'closeMovies()'/>";
        moviePOPUP.className = moviePOPUP.className + " show";

        if(window.XMLHttpRequest){
           xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }   
          xmlhttp.onreadystatechange=function(){
         
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                   document.getElementById("moviePopUpBody").innerHTML = xmlhttp.responseText;
            } 
            else
              document.getElementById("moviePopUpBody").innerHTML = "<img class ='loading' src ='Images/ajax-loader.gif'/> ";
            
        }
        xmlhttp.open("GET", "MovieGenreAjax.php?genre=" + value, true);
        xmlhttp.send();  
    }
}

function closeMovies(){
    var moviePOPUP = document.getElementById("movieByGenre");
    document.getElementById("moviePopUpHeader").innerHTML = "";
    moviePOPUP.className = "";
    moviePOPUP.className = "popup";
}

function showActor(){
    var xmlhttp;
    var firstName = document.getElementById("first_name").value;
    var lastName = document.getElementById("last_name").value;
    var actorPOPUP = document.getElementById("actorRoles");
    if (firstName == "" && lastName == "")
        document.getElementById("actorError").innerHTML = "Must enter an actor name!";
    else if (firstName == "")
        document.getElementById("actorError").innerHTML = "Enter the actor's first name!";
    else if(lastName == "")
        document.getElementById("actorError").innerHTML = "Enter the actor's last name!";
    else{
        document.getElementById("actorError").innerHTML = "";
        document.getElementById("actorPopUpHeader").innerHTML = "";
        document.getElementById("actorPopUpHeader").innerHTML = firstName +" "+lastName + "  <input type='button' class ='exitButton' onclick = 'closeActor()'/>";
        actorPOPUP.className = actorPOPUP.className + " show";

        if(window.XMLHttpRequest){
           xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }   
          xmlhttp.onreadystatechange=function(){
         
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                   document.getElementById("actorPopUpBody").innerHTML = xmlhttp.responseText;
            } 
            else
              document.getElementById("actorPopUpBody").innerHTML = "<img class ='loading' src ='Images/ajax-loader.gif'/> ";
            
        }
        xmlhttp.open("GET", "ActorRoleAjax.php?firstname=" + firstName+"&lastname="+lastName, true);
        xmlhttp.send(); 
    }

}

function closeActor(){
      var actorPOPUP = document.getElementById("actorRoles");
    document.getElementById("actorPopUpHeader").innerHTML = "";
    actorPOPUP.className = "";
    actorPOPUP.className = "popup";
}

function showMovieRatings(){
    var xmlhttp;
    var filter = document.getElementById("movieFilter").value;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){        
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
              document.getElementById("movieRatings").innerHTML = xmlhttp.responseText;
        } 
        else
            document.getElementById("movieRatings").innerHTML = "<img class ='loading' src ='Images/ajax-loader.gif'/> ";           
    } 
    xmlhttp.open("GET", "RatingsAjax.php?filter=" + filter, true);
    xmlhttp.send();  
}

function expandView(movie_id){
    var xmlhttp;
    var target = document.getElementsByName(movie_id)[0].value;
    if (target == "View Ratings" && document.getElementById(movie_id).childElementCount < 3){     
        if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(movie_id).innerHTML = document.getElementById(movie_id).innerHTML + xmlhttp.responseText;
            }
        } 
        xmlhttp.open("GET", "UserRatingsAjax.php?movieid=" + movie_id, true);
        xmlhttp.send();
        document.getElementById(movie_id).className = document.getElementById(movie_id).className + " ratingRowExpand";
    }
    else if(target == "View Ratings" && document.getElementById(movie_id).childElementCount == 3){
    document.getElementById(movie_id).lastElementChild.className = "ratingsExpanded";
    document.getElementById(movie_id).className = document.getElementById(movie_id).className + " ratingRowExpand";
    }
    else if (target == "Hide Ratings" && document.getElementById(movie_id).getElementsByClassName("ratingsExpanded")[0] != null){
        document.getElementById(movie_id).getElementsByClassName("ratingsExpanded")[0].className = document.getElementById(movie_id).getElementsByClassName("ratingsExpanded")[0].className + " hide" ;
        document.getElementById(movie_id).className = "ratingRow";
    } 
}

function updateButton(movie_id){
    var target = document.getElementsByName(movie_id)[0];
    if (target.value == "View Ratings")
        target.value = "Hide Ratings";
    else
        target.value = "View Ratings";
}

function updateUserRateError(){
    debugger;
    var username = document.getElementById("username").value;
    if(username == ""){
        document.getElementById("userRateError").innerHTML = "Must enter a user name to rate movies!";
    }
    else {
        document.getElementById("userRateError").innerHTML = "";
    }
}

function starLight2(object){
    var listRates = object.parentElement.getElementsByClassName("rateButton");
    listRates[0].className = listRates[0].className + " rateButtonLit";
}

function starUnLight2(object){
    var listRates = object.parentElement.getElementsByClassName("rateButton");
    listRates[0].className = "rateButton";
}

function starLight3(object){
    var listRates = object.parentElement.getElementsByClassName("rateButton");
    listRates[0].className = listRates[0].className + " rateButtonLit";
    listRates[1].className = listRates[1].className + " rateButtonLit";
}

function starUnLight3(object){
    var listRates = object.parentElement.getElementsByClassName("rateButton");
    listRates[0].className = "rateButton";
    listRates[1].className = "rateButton";
}

function starLight4(object){
    var listRates = object.parentElement.getElementsByClassName("rateButton");
    listRates[0].className = listRates[0].className + " rateButtonLit";
    listRates[1].className = listRates[1].className + " rateButtonLit";
    listRates[2].className = listRates[2].className + " rateButtonLit";
}

function starUnLight4(object){
    var listRates = object.parentElement.getElementsByClassName("rateButton");
    listRates[0].className = "rateButton";
    listRates[1].className = "rateButton";
    listRates[2].className = "rateButton";
}

function starLight5(object){
    var listRates = object.parentElement.getElementsByClassName("rateButton");
    listRates[0].className = listRates[0].className + " rateButtonLit";
    listRates[1].className = listRates[1].className + " rateButtonLit";
    listRates[2].className = listRates[2].className + " rateButtonLit";
    listRates[3].className = listRates[3].className + " rateButtonLit";
}

function starUnLight5(object){
    var listRates = object.parentElement.getElementsByClassName("rateButton");
    listRates[0].className = "rateButton";
    listRates[1].className = "rateButton";
    listRates[2].className = "rateButton";
    listRates[3].className = "rateButton";
}