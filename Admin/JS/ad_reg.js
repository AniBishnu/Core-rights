function checkFirstName() {
    var nameInput = document.getElementById("AD_Firstname").value;
    var errorElement = document.getElementById("firsterror");

    // Regular expression to allow only alphabets and spaces
    var nameRegex = /^[a-zA-Z\s]+$/;

    // Check if the input is empty
    if (nameInput == "") {
        errorElement.innerHTML = "Name cannot be empty.";
        return false;
    }

    // Check if the name matches the regex
    if (!nameRegex.test(nameInput)) {
        errorElement.innerHTML = "Name must contain only letters and spaces.";
        return false;
    }

    else {
        errorElement.innerHTML = ""; // Clear error message
    }
}

function checkLastName() {
    var nameInput = document.getElementById("AD_Lastname").value;
    var errorElement = document.getElementById("lasterror");

    // Regular expression to allow only alphabets and spaces
    var nameRegex = /^[a-zA-Z\s]+$/;

    // Check if the input is empty
    if (nameInput == "") {
        errorElement.innerHTML = "Name cannot be empty.";
        return false;
    }

    // Check if the name matches the regex
    if (!nameRegex.test(nameInput)) {
        errorElement.innerHTML = "Name must contain only letters and spaces.";
        return false;
    }

    else {
        errorElement.innerHTML = ""; // Clear error message
    }
}

function checkPassword() {
    var passwordField = document.getElementById("AD_password").value;
        var errorField = document.getElementById("passworderror");


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

function checkGender() {
    var genders = document.getElementsByName("AD_Gender");
    var isChecked = false;

    // Check if any radio button is checked
    for (var i = 0; i < genders.length; i++) {
        if (genders[i].checked) {
            isChecked = true;
        
        }
    }

    if (!isChecked) {
        document.getElementById("genderError").innerHTML = "Please select a gender.";
        return false;
    } 
    else {
        document.getElementById("genderError").innerHTML = ""; 
    }
}


function checkDate() {
    var dateInput = document.getElementById("AD_dob").value;
    var errorElement = document.getElementById("dateError");

    // Check if the date is empty
    if (!dateInput) {
        errorElement.innerHTML = "Please enter a date.";
        return false;
    }
    var date = new Date(dateInput);
    if (isNaN(date.getTime())) {
        errorElement.innerHTML = "Invalid date format.";
        return false;
    }

    // Check if the date is in the future
    var today = new Date();
    today.setHours(0, 0, 0, 0);

    if (date > today) {
        errorElement.innerHTML = "Date cannot be in the future.";
        return false;

    } 
    else {
        errorElement.innerHTML = ""; // Clear error message
    }
}


function checkPhone() {
    var AD_phone = document.getElementById("AD_phone").value;
    const phoneRegex = /^[0-9]{11}$/;
  
    if (AD_phone == "" || !phoneRegex.test(AD_phone)) 
    {
      document.getElementById("phoneerror").innerHTML = "Enter valid phone number"; 
      return false;
    } 
    else 
    {
      document.getElementById("phoneerror").innerHTML = ""; 
    }
  }

function checkEmail() {
    var AD_email = document.getElementById("AD_email").value;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  
    if (AD_email == "" || !emailRegex.test(AD_email)) {
      document.getElementById("emailerror").innerHTML = "Enter valid email address"; 
      return false;
    } 
    else 
    {
      document.getElementById("emailerror").innerHTML = ""; 
    }
  }


  function checkCv() {
    var fileInput = document.getElementById("AD_cv");
    var errorElement = document.getElementById("fileerror");
    var file = fileInput.files[0]; // Get the selected file

    // Check if a file is selected
    if (!file) {
        errorElement.innerHTML = "Please select a file.";
        return false;
    }

    // Validate file type
    var fileType = file.type; // MIME type
    if (fileType !== "application/pdf") {
        errorElement.innerHTML = "Only PDF files are allowed.";
        return false;
    }

    // Clear error if valid
    errorElement.innerHTML = ""; // Clear error message
}
  
function checkTemppic() {
    var fileInput = document.getElementById("propic");
    var errorElement = document.getElementById("propicerror");
    var file = fileInput.files[0]; // Get the selected file

    // Check if a file is selected
    if (!file) {
        errorElement.innerHTML = "Please select a file.";
        return false;
    }

    // Validate file type
    var fileType = file.type; // MIME type
    if (!fileType.startsWith("image/")) {
        errorElement.innerHTML = "Only picture files (JPG, PNG, GIF, etc.) are allowed.";
        return false;
    }

    // Clear error if valid
    errorElement.innerHTML = ""; // Clear error message
}
  


 

  function validation() {
    if(checkFirstName()==false || checkLastName()==false || checkPassword()==false || checkGender()==false || checkDate()==false || checkPhone()==false || checkEmail()==false || checkCv()==false|| checkTemppic()==false){
        return false;
    }
  }