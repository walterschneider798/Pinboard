function register(firstname, lastname, email, password, repeatedpassword) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("message").innerHTML = "<p class='text-success'>Your Registration worked, please check your email</p>";
        } else if (this.readyState == 4 && this.status == 400) {
            document.getElementById("message").innerHTML = "<p class='text-danger'>Your Registration failed</p>";
        } else if (this.readyState == 4 && this.status == 422) {
            document.getElementById("message").innerHTML = "<p class='text-danger'>"+ this.responseText +"</p>";
        } else if (this.readyState !== 4) {
            document.getElementById("message").innerHTML = "<div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div>";
        }
      };

    xhttp.open("POST", "/pinboard/backend/user/createUser.php", true);
    xhttp.send(JSON.stringify({
        firstname: firstname,
        lastname: lastname,
        email: email,
        password: password,
        repeatedpassword: repeatedpassword
    }));
}


function login(email, password, hashed ){
    //Ajax call machen
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                localStorage.setItem("user", this.responseText);
                location.href = "/pinboard/dashboard/index.php";
            } else if (this.readyState == 4 && this.status == 500) {
                document.getElementById("messagelogin").innerHTML = "<p class='text-danger'>Your Login failed</p>";
            } else if (this.readyState == 4 && this.status == 422) {
                document.getElementById("messagelogin").innerHTML = "<p class='text-danger'>"+ this.responseText +"</p>";
            } else if (this.readyState == 4 && this.status == 502) {
                document.getElementById("messagelogin").innerHTML = "<p class='text-danger'>"+ this.responseText +"</p>";
            } else if (this.readyState !== 4) {
                document.getElementById("messagelogin").innerHTML = "<div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div>";
            }
        
    }
    xhttp.open("POST", "/pinboard/backend/user/checkLogin.php", true);

    xhttp.send(JSON.stringify({
        email: email,
        password: password,
        hashed: hashed
    }));
}



function confirm(){

    var key = new URL(window.location.href).searchParams.get("k");
    //Ajax call machen
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
     
               if (this.readyState == 4 && this.status == 200){
            document.getElementById("verificationmessage").innerHTML = "<p class='text-success'>Successfully registered for the Cognizant Pinboard</p>";
        } else if (this.readyState == 4 && this.status == 501){
            document.getElementById("verificationmessage").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 502){
            document.getElementById("verificationmessage").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 503){
            document.getElementById("verificationmessage").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 400){
            document.getElementById("verificationmessage").innerHTML = "<p class='text-danger'>Your Verification failed</p>";
        } else if (this.readyState !== 4) {
            document.getElementById("verificationmessage").innerHTML = "<div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div>";
        }
    
};
    
    xhttp.open('POST', '/pinboard/backend/user/confirmUser.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(
        JSON.stringify({
            key: key
        })
    );
}



function changepassword(password1, newpassword, confirmnewpassword){
           
    var temp =  JSON.parse(localStorage.getItem('user'));

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){

        if (this.readyState == 4 && this.status == 200){

             var NewLocalstorage = {'userid': temp.userid, 'firstname': temp.firstname, 'lastname': temp.lastname, 'email': temp.email, 'password': this.responseText }
            localStorage.removeItem('user');
            localStorage.setItem('user',  JSON.stringify(NewLocalstorage)); 
            
            document.getElementById("passwordchange").innerHTML = "<p class='text-success'>Successfully changed your password</p>";
        } else if (this.readyState == 4 && this.status == 501){
            document.getElementById("passwordchange").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 502){
            document.getElementById("passwordchange").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 503){
            document.getElementById("passwordchange").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 422){
            document.getElementById("passwordchange").innerHTML = "<p class='text-danger'>" + this.responseText + "</p>";
        } else if (this.readyState !== 4) {
            document.getElementById("passwordchange").innerHTML = "<div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div>";
        }
    };

    xhttp.open('POST', '/pinboard/backend/user/changepassword.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.send(
        JSON.stringify({
            
            newpassword: newpassword,
            confirmnewpassword: confirmnewpassword,
            userid: temp.userid,
            oldpassword: temp.password,
            email: temp.email,
            firstname: temp.firstname,
            lastname: temp.lastname,
            password: password1
        })
    );
}


function deleteuser(email, password){

    var temp =  JSON.parse(localStorage.getItem('user'));

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){

        if (this.readyState == 4 && this.status == 200){
            localStorage.removeItem('user');
            document.getElementById("deletemessage").innerHTML = "<p class='text-success'>Successfully deleted your account</p>";
            location.href = "/pinboard/index.html"
        } else if (this.readyState == 4 && this.status == 501){
            document.getElementById("deletemessage").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 502){
            document.getElementById("deletemessage").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 503){
            document.getElementById("deletemessage").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 422){
            document.getElementById("deletemessage").innerHTML = "<p class='text-danger'>" + this.responseText + "</p>";
        } else if (this.readyState !== 4) {
            document.getElementById("deletemessage").innerHTML = "<div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div>";
        }
    };

    xhttp.open('POST', '/pinboard/backend/user/deleteuser.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.send(
        JSON.stringify({
            userid: temp.userid,
            cemail: temp.email,
            cpassword: temp.password,
            email: email,
            password: password  
        })
    )
}



function changenamecheck(changefirstname, changelastname){

    var temp =  JSON.parse(localStorage.getItem('user'));

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){

        if (this.readyState == 4 && this.status == 200){
            localStorage.removeItem('user');
            localStorage.setItem("user", this.responseText);
            document.getElementById("changeusermessage").innerHTML = "<p class='text-success'>Successfully changed your name</p>";
        } else if (this.readyState == 4 && this.status == 501){
            document.getElementById("changeusermessage").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 502){
            document.getElementById("changeusermessage").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 503){
            document.getElementById("changeusermessage").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 422){
            document.getElementById("changeusermessage").innerHTML = "<p class='text-danger'>" + this.responseText + "</p>";
        } else if (this.readyState !== 4) {
            document.getElementById("changeusermessage").innerHTML = "<div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div>";
        }
    };

    xhttp.open('POST', '/pinboard/backend/user/changeuser.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.send(
        JSON.stringify({
            firstname: changefirstname,
            lastname: changelastname,
            cfirstname: temp.firstname,
            clastname: temp.lastname,
            cuserid: temp.userid,
            cemail: temp.email,
            cpassword: temp.password
        })
    )
}


function resetpassword(resetemail, resetverify){

 

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){

        if (this.readyState == 4 && this.status == 200){
            document.getElementById("resetpasswordresponse").innerHTML = "<p class='text-success'>Successfully sent reset password email, please check your inbox </p>";
        } else if (this.readyState == 4 && this.status == 501){
            document.getElementById("resetpasswordresponse").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 502){
            document.getElementById("resetpasswordresponse").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 503){
            document.getElementById("resetpasswordresponse").innerHTML = "<p class='text-danger'>Oops... Something went wrong</p>"
        } else if (this.readyState == 4 && this.status == 422){
            document.getElementById("resetpasswordresponse").innerHTML = "<p class='text-danger'>" + this.responseText + "</p>";
        } else if (this.readyState !== 4) {
            document.getElementById("resetpasswordresponse").innerHTML = "<div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div>";
        }
    };

    xhttp.open('POST', '/pinboard/backend/user/resetpassword.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.send(
        JSON.stringify({
            resetemail: resetemail
        })
    )
}


function checkedifloggedin(){
    if (localStorage.getItem('user') == null || localStorage.user == undefined) {
        location.href = "../index.html";
    }
    if (!localStorage.getItem('user')) {
        location.href = "/pinboard/index.html";
        
    }
    
}

function logout() {
    localStorage.removeItem("user");
    location.href = "/pinboard/";
}

function openusersettings(){
    location.href = "/pinboard/dashboard/main/include/pages/user_settings.php";
}

function openchangepassword(){
    location.href = "/pinboard/dashboard/main/include/pages/change_password.php";
}

function openindex(){
    location.href = "/pinboard/dashboard/index.php";
}

function openproductlist(){
    location.href = "/pinboard/dashboard/main/include/pages/product_list.php";
}

function opencreatenewproduct(){
    location.href = "/pinboard/dashboard/main/include/pages/create_product.php";
}

function openimmobilie(){
    location.href = "/pinboard/dashboard/main/include/pages/create_immobilie.php";
}

function openimmobilielist(){
    location.href = "/pinboard/dashboard/main/include/pages/immobilielist.php";
}

