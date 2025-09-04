function checkID() {
    var id = document.getElementById("REP_ID").value;
    var errorField = document.getElementById("iderror");

    // Check if the ID is empty
    if (id == "") {
        errorField.innerHTML = "ID cannot be empty.";
        return false;
    }

    // Check if the ID is a valid positive number
    if (id <= 0) {
        errorField.innerHTML = "ID must be a positive number.";
        return false;
    }

    else{// Clear any previous error messages
    errorField.innerHTML = "";
    }
}

function checkPassword() {
    var passwordField = document.getElementById("REP_password").value;
        var errorField = document.getElementById("passerror");


    if (passwordField == "") {
            errorField.innerHTML = "Password cannot be empty.";
            return false;
        }
    else if (passwordField.length < 8) {
        errorField.innerHTML = "Password must be at least 8 characters long.";
        return false;
    } 
    else {
        errorField.innerHTML = "";
        
    }
}

function validation() {
    if( checkID()==false || checkPassword()==false){
        return false;
    }
  } 