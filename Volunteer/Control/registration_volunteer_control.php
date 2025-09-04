
<?php
session_start();
include '../Model/VLN_Db.php';
$errors = [];
$upload_dir = '../Uploads/';
$Images_dir = '../Images/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // First Name Validation
    $firstName = "";
    $firstError = "";
    
    if (empty($_POST["VLN_Firstname"])) {
        $firstError = "First Name is required.";
        $error["Firstname"]="error";
        echo $firstError . "<br>";
    } else {
        $firstName = $_POST["VLN_Firstname"];
        
        // Validate that the input contains only letters and spaces
        if (!preg_match("/^[a-zA-Z\s]*$/", $firstName)) {
            $firstError = "Only letters and spaces are allowed for First Name.";
            echo $firstError . "<br>";
        } else {
            echo "First Name: " . $firstName . "<br>";
        }
    }

    // Last Name Validation
    $lastName = "";
    $lastError = "";

    if (empty($_POST["VLN_Lastname"])) {
        $lastError = "Last Name is required.";
        echo $lastError . "<br>";
    } else {
        $lastName = $_POST["VLN_Lastname"];
        
        // Validate that the input contains only letters and spaces
        if (!preg_match("/^[a-zA-Z\s]*$/", $lastName)) {
            $lastError = "Only letters and spaces are allowed for Last Name.";
            echo $lastError . "<br>";
        } else {
            echo "Last Name: " . $lastName . "<br>";
        }
    }

    $password = "";
    $passError = "";

    if (empty($_POST["VLN_password"])) {
        $passError = "Password is required.";
        echo $passError . "<br>";
    } else {
        $password = $_POST["VLN_password"];
        // Check if the password is long enough (e.g., at least 8 characters)
        if (strlen($password) < 8) {
            $passError = "Password must be at least 8 characters long.";
            echo $passError . "<br>";
        }
       
        // If all validations pass, show a success message (optional)
        else {
            echo "Password is valid.<br>";
        }
    }

    $gender = "";
    $genderError = "";

    // Check if gender is selected
    if (empty($_POST["VLN_Gender"])) {
        $genderError = "Gender is required.";
        echo $genderError . "<br>";
    } else {
        $gender = $_POST["VLN_Gender"];
        echo "Selected Gender: " . $gender . "<br>";
    }

    $dob = "";
    $dobError = "";

    // Check if Date of Birth is empty
    if (empty($_POST["VLN_dob"])) {
        $dobError = "Date of Birth is required.";
        echo $dobError . "<br>";
    } else {
        $dob = $_POST["VLN_dob"];

        // Validate that the date is not in the future
        $currentDate = date("Y-m-d");
        if ($dob > $currentDate) {
            $dobError = "Date of Birth cannot be in the future.";
            echo $dobError . "<br>";
        } else {
            echo "Date of Birth: " . $dob . "<br>";
        }
    }

    $nid = "";
    $nidError = "";

    // Check if NID is provided
    if (empty($_POST["VLN_NID"])) {
        $nidError = "NID is required.";
        echo $nidError . "<br>";
    } else {
        $nid = $_POST["VLN_NID"];

        // Check if the NID is a valid number (e.g., non-negative)
        if (!is_numeric($nid)) {
            $nidError = "NID must be a valid number.";
            echo $nidError . "<br>";
        }
        // Check if NID length is appropriate (e.g., between 9 and 12 digits)
        elseif (!preg_match("/^[0-9]{13}$/", $nid)) {
            $nidError = "NID must be 13 digits.";
            echo $nidError . "<br>";
        } else {
            echo "NID: " . $nid . "<br>";
        }
    }

    $phone = "";
    $phoneError = "";

    // Check if the phone number is provided
    if (empty($_POST["VLN_phone"])) {
        $phoneError = "Mobile Number is required.";
        echo $phoneError . "<br>";
    } else {
        $phone = $_POST["VLN_phone"];

        // Validate that the phone number is numeric and has the correct length (e.g., 10 digits)
        if (!preg_match("/^[0-9]{11}$/", $phone)) {
            $phoneError = "Mobile Number must be exactly 11 digits.";
            echo $phoneError . "<br>";
        } else {
            echo "Mobile Number: " . $phone . "<br>";
        }
    }

    $email = "";
    $emailError = "";

    // Check if the email is provided
    if (empty($_POST["VLN_email"])) {
        $emailError = "Email is required.";
        echo $emailError . "<br>";
    } else {
        $email = $_POST["VLN_email"];

        // Validate that the email is in a valid format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format.";
            echo $emailError . "<br>";
        }
        // Optionally, check if the email is from Gmail
        elseif (strpos($email, '@gmail.com') === false) {
            $emailError = "Only Gmail addresses are allowed.";
            echo $emailError . "<br>";
        } else {
            echo "Email: " . $email . "<br>";
        }
    }

    $division = "";
    $divisionError = "";

    // Check if Division is selected
    if ($_POST["Division"] == "none") {
        $divisionError = "Please select a valid division.";
        echo $divisionError . "<br>";
    } else {
        $division = $_POST["Division"];
        echo "Selected Division: " . $division . "<br>";
    }


    $district = "";
    $districtError = "";

    // Check if District is selected
    if ($_POST["District"] == "none") {
        $districtError = "Please select a valid district.";
        echo $districtError . "<br>";
    } else {
        $district = $_POST["District"];
        echo "Selected District: " . $district . "<br>";
    }

    $workTime = "";
    $workError = "";

    // Check if any Work Time is selected
    if (empty($_POST["VLN_Work"])) {
        $workError = "Please select a work time.";
        echo $workError . "<br>";
    } else {
        $workTime = $_POST["VLN_Work"];
        echo "Selected Work Time: " . $workTime . "<br>";
    }
}


if (isset($_FILES["VLN_cv"])) {
    if ($_FILES["VLN_cv"]["error"] === UPLOAD_ERR_OK) {
        $cv_name = basename($_FILES["VLN_cv"]["name"]);
        $target_file = $upload_dir . $cv_name;

        
        $allowed_types = ['application/pdf'];
        $file_type = mime_content_type($_FILES["VLN_cv"]["tmp_name"]);
        if (!in_array($file_type, $allowed_types)) {
            $errors["VLN_cv"] = "Only PDF files are allowed.";
        }

        
        if ($_FILES["VLN_cv"]["size"] > 5 * 1024 * 1024) {
            $errors["VLN_cv"] = "File size must not exceed 5MB.";
        }

        
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); 
        }

        
        if (empty($errors) && move_uploaded_file($_FILES["VLN_cv"]["tmp_name"], $target_file)) {
            echo "File uploaded successfully: $cv_name<br>";
        } else {
            echo "Error: Failed to move uploaded file.<br>";
            $errors["VLN_cv"] = "Upload failed.";
        }
    } else {
        echo "File upload error: " . $_FILES["VLN_cv"]["error"] . "<br>";
        $errors["VLN_cv"] = "Error uploading the file.";
    }
} else {
    echo "No file uploaded.<br>";
    $errors["VLN_cv"] = "File is required.";
}

if (isset($_FILES["VLN_pic"])) {
    if ($_FILES["VLN_pic"]["error"] === UPLOAD_ERR_OK) {
    $image_name = basename($_FILES["VLN_pic"]["name"]);
    $target_file1 = $Images_dir . $image_name;

    // Check file type
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $file_type = mime_content_type($_FILES["VLN_pic"]["tmp_name"]);
    if (!in_array($file_type, $allowed_types)) {
    $errors["VLN_pic"] = "Only JPEG, PNG, and GIF files are allowed.";
    }

    // Check file size (limit to 5MB)
    if ($_FILES["VLN_pic"]["size"] > 5 * 1024 * 1024) {
    $errors["VLN_pic"] = "File size must not exceed 5MB.";
    }

    // Create directory if it doesn't exist
    if (!is_dir($Images_dir)) {
    mkdir($Images_dir, 0777, true);
    }

    // Move uploaded file
    if (empty($errors) && move_uploaded_file($_FILES["VLN_pic"]["tmp_name"], $target_file1)) {
    echo "File uploaded successfully: $image_name<br>";
    } else {
    echo "Error: Failed to move uploaded file.<br>";
    $errors["VLN_pic"] = "Upload failed.";
    }
    } else {
    echo "File upload error: " . $_FILES["VLN_pic"]["error"] . "<br>";
    $errors["VLN_pic"] = "Error uploading the file.";
    }
} else {
    echo "No file uploaded.<br>";
    $errors["VLN_pic"] = "File is required.";
}

// Database Insertion
if (empty($errors)) {
    $db = new mydb();
    $con = $db->openCon();

    $result = $db->addUser(
        $con,
        'volunteer',
        $_POST["VLN_email"],
        $_POST["VLN_dob"],
        $_POST["VLN_Gender"],
        $_POST["VLN_Lastname"],
        $_POST["VLN_Firstname"],
        $_POST["VLN_password"],
        $_POST["VLN_NID"],
        $_POST["VLN_phone"],
        $_POST["VLN_Work"],
        $_POST["Division"],
        $_POST["District"],
        $target_file,
        $target_file1
    );

    if ($result) {
        header("Location: ../View/Home.php");
        exit();
    } else {
        echo "Database Error: " . $con->error;
    }

    $db->closeCon($con);
} else {
    echo "<br><b>There were errors in your form submission:</b><br>";
    foreach ($errors as $key => $error) {
        echo "$key: $error<br>";
    }
}

?>
    
