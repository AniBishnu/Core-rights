function checkDescription() {
    var address = document.getElementById("description").value;
    var addresserror = document.getElementById("descriptionerror");

    if (address == "") {
        addresserror.innerHTML = "Description cannot be empty.";
        return false;
    } 
    else if (address.length < 5) {
        addresserror.innerHTML = "Description must be at least 5 characters long.";
        return false;
    } 
    else {
        addresserror.innerHTML = ""; // Clear the error if the input is valid
       
    }
}

function checkDate() {
    var dateInput = document.getElementById("COM_Time_Occured").value;
    var errorElement = document.getElementById("dateerror");

    // Check if the date is empty
    if (!dateInput) {
        errorElement.innerHTML = "Please enter a date.";
        return false;
    }
    var date = new Date(dateInput);
    if (isNaN(date.getTime())) {
        errorElement.innerHTML = "Invalid date format.";
        return;
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


function checkVictimName() {
    var nameInput = document.getElementById("COM_Victim").value;
    var errorElement = document.getElementById("vicitmerror");

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


function checkOpponenttName() {
    var nameInput = document.getElementById("COM_Opponent").value;
    var errorElement = document.getElementById("opponenterror");

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


function checkOccurence() {
    var address = document.getElementById("COM_Place").value;
    var addresserror = document.getElementById("placeerror");

    if (address == "") {
        addresserror.innerHTML = "Address cannot be empty.";
        return false;
    } 
    else if (address.length < 5) {
        addresserror.innerHTML = "Address must be at least 5 characters long.";
        return false;
    } 
    else {
        addresserror.innerHTML = ""; // Clear the error if the input is valid
       
    }
}

function checkDivision() 
{
    var divisionSelect = document.getElementById("COM_Division");
    var divisionerror = document.getElementById("divisionerror");
    
    if (divisionSelect.value == "none") 
    {
        divisionerror.innerHTML = "Please select a division.";
        return false;
    } 
    else 
    {
        divisionerror.innerHTML = ""; // Clear error if valid
        
    }
}


function checkDistrict() 
{
    var districtSelect = document.getElementById("COM_District");
    var districterror = document.getElementById("districterror");
    
    if (districtSelect.value == "none") 
    {
        districterror.innerHTML = "Please select a district.";
        return false;
    } 
    else 
    {
        districterror.innerHTML = ""; // Clear error if valid
        
    }
}

function validation() {
    if(checkDescription()==false || checkDate()==false || checkVictimName()==false || checkOpponenttName()==false || checkOccurence()==false || checkDivision()==false || checkDistrict()==false){
        return false;
    }
  } 