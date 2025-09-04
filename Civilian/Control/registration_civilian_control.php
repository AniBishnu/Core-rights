<?php
    session_start();
?>

<html>
    <head>
        <title>Registration Control Panel</title>
    </head>
    <?php include '../Model/CIV_Db.php'; ?>
    <body>
        Welcome
        <?php 
        $errors = [];
        $CIV_dob = false;
        $Images_dir = '../Images/';

        // Validate First Name
        if (!empty($_POST["CIV_Firstname"]) && ctype_alpha($_POST["CIV_Firstname"])) {
            echo $_POST["CIV_Firstname"];
        } else {
            echo "First Name should only contain alphabets.<br>";
            $errors["CIV_Firstname"] = "Invalid";
        }
        // Validate Last Name
        if (ctype_alpha($_POST["CIV_Lastname"])) {
            echo " " . $_POST["CIV_Lastname"];
        } else {
            echo "Last Name should only contain alphabets.<br>";
            $errors["CIV_Lastname"] = "Invalid";
        }

        echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error message variable
    $passError = "";

    // Get the password input from the form
    $password = $_POST['VIC_password'];

    // Check if the password field is empty
    if (empty($password)) {
        $passError = "Password cannot be empty.";
        echo $passError;
    } 
    // Check if the password meets minimum length (8 characters)
    elseif (strlen($password) < 8) {
        $passError = "Password must be at least 8 characters long.";
        echo $passError;
    } 

    // If no errors, proceed with further processing (e.g., saving to the database)
    if (empty($passError)) {
        echo "<p>Password is valid!</p>";
        // You can proceed with hashing the password and storing it securely.
    }
}


        echo "<br>";

        // Validate Gender
        if (isset($_POST["CIV_Gender"])) {
            echo $_POST["CIV_Gender"] . "<br>";
        } else {
            echo "Please select at least one gender.<br>";
            $errors["CIV_Gender"] = "Invalid";
        }

        // Validate Date of Birth
        if (!empty($_POST["CIV_dob"])) {
            $dateParts = explode('-', $_POST["CIV_dob"]);
            if (count($dateParts) == 3 && checkdate((int)$dateParts[1], (int)$dateParts[2], (int)$dateParts[0])) {
                echo "Date of Birth: " . $_POST["CIV_dob"] . "<br>";
                $CIV_dob = true;
            } else {
                echo "Please enter a valid date in the format YYYY-MM-DD.<br>";
                $errors["CIV_dob"] = "Invalid";
            }
        } else {
            echo "Please enter a valid date of birth.<br>";
            $errors["CIV_dob"] = "Invalid";
        }

        // Validate Phone Number
        if (preg_match('/^0[0-9]+$/', $_POST["CIV_phone"])) {
            echo $_POST["CIV_phone"];
        } else {
            echo "Phone number must start with 0 and contain only numbers.<br>";
            $errors["CIV_phone"] = "Invalid";
        }

        echo "<br>";

        // Validate Email Address
        if (isset($_POST["CIV_email"]) && preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/', $_POST["CIV_email"])) {
            echo $_POST["CIV_email"];
            
            
        } else {
            echo "Email address is required and must contain '@' and end with '.com'.<br>";
            $errors["CIV_email"] = "Invalid";
        }

        echo "<br>";

        // Validate Division
        if (isset($_POST["Division"])) {
            echo $_POST["Division"] . "<br>";
        } else {
            echo "Please select at least one division.<br>";
            $errors["Division"] = "Invalid";
        }

        // Validate District
        if (isset($_POST["District"])) {
            echo $_POST["District"] . "<br>";
        } else {
            echo "Please select at least one district.<br>";
            $errors["District"] = "Invalid";
        }

        // validate NID
        if (preg_match('/^[0-9]{13}$/', $_POST["CIV_NID"])) {
            echo $_POST["CIV_NID"];
        } else {
            echo "NID must contain exactly 13 digits.<br>";
            $errors["CIV_NID"] = "Invalid";
        }

        // Validate Address
        if (!empty($_POST["address"])) {
            echo $_POST["address"];
        } else {
            echo "Address is required.<br>";
            $errors["address"] = "Invalid";
        }

        
        // Image Upload
        if (isset($_FILES["CIV_NID_front"])) {
            if ($_FILES["CIV_NID_front"]["error"] === UPLOAD_ERR_OK) {
            $image_name = basename($_FILES["CIV_NID_front"]["name"]);
            $target_file1 = $Images_dir . $image_name;

            // Check file type
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            $file_type = mime_content_type($_FILES["CIV_NID_front"]["tmp_name"]);
            if (!in_array($file_type, $allowed_types)) {
                $errors["CIV_NID_front"] = "Only JPEG, PNG, and GIF files are allowed.";
            }

            // Check file size (limit to 5MB)
            if ($_FILES["CIV_NID_front"]["size"] > 5 * 1024 * 1024) {
                $errors["CIV_NID_front"] = "File size must not exceed 5MB.";
            }

            // Create directory if it doesn't exist
            if (!is_dir($Images_dir)) {
                mkdir($Images_dir, 0777, true);
            }

            // Move uploaded file
            if (empty($errors) && move_uploaded_file($_FILES["CIV_NID_front"]["tmp_name"], $target_file1)) {
                echo "File uploaded successfully: $image_name<br>";
            } else {
                echo "Error: Failed to move uploaded file.<br>";
                $errors["CIV_NID_front"] = "Upload failed.";
            }
            } else {
            echo "File upload error: " . $_FILES["CIV_NID_front"]["error"] . "<br>";
            $errors["CIV_NID_front"] = "Error uploading the file.";
            }
        } else {
            echo "No file uploaded.<br>";
            $errors["CIV_NID_front"] = "File is required.";
        }

        // Image Upload

        if (isset($_FILES["CIV_NID_Back"])) {
            if ($_FILES["CIV_NID_Back"]["error"] === UPLOAD_ERR_OK) {
            $image_name = basename($_FILES["CIV_NID_Back"]["name"]);
            $target_file = $Images_dir . $image_name;

            // Check file type
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            $file_type = mime_content_type($_FILES["CIV_NID_Back"]["tmp_name"]);
            if (!in_array($file_type, $allowed_types)) {
            $errors["CIV_NID_Back"] = "Only JPEG, PNG, and GIF files are allowed.";
            }

            // Check file size (limit to 5MB)
            if ($_FILES["CIV_NID_Back"]["size"] > 5 * 1024 * 1024) {
            $errors["CIV_NID_Back"] = "File size must not exceed 5MB.";
            }

            // Create directory if it doesn't exist
            if (!is_dir($Images_dir)) {
            mkdir($Images_dir, 0777, true);
            }

            // Move uploaded file
            if (empty($errors) && move_uploaded_file($_FILES["CIV_NID_Back"]["tmp_name"], $target_file)) {
            echo "File uploaded successfully: $image_name<br>";
            } else {
            echo "Error: Failed to move uploaded file.<br>";
            $errors["CIV_NID_Back"] = "Upload failed.";
            }
            } else {
            echo "File upload error: " . $_FILES["CIV_NID_Back"]["error"] . "<br>";
            $errors["CIV_NID_Back"] = "Error uploading the file.";
            }
        } else {
            echo "No file uploaded.<br>";
            $errors["CIV_NID_Back"] = "File is required.";
        }


        if (isset($_FILES["temppic"])) {
            if ($_FILES["temppic"]["error"] === UPLOAD_ERR_OK) {
            $image_name = basename($_FILES["temppic"]["name"]);
            $target_file3 = $Images_dir . $image_name;

            // Check file type
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            $file_type = mime_content_type($_FILES["temppic"]["tmp_name"]);
            if (!in_array($file_type, $allowed_types)) {
            $errors["temppic"] = "Only JPEG, PNG, and GIF files are allowed.";
            }

            // Check file size (limit to 5MB)
            if ($_FILES["temppic"]["size"] > 5 * 1024 * 1024) {
            $errors["temppic"] = "File size must not exceed 5MB.";
            }

            // Create directory if it doesn't exist
            if (!is_dir($Images_dir)) {
            mkdir($Images_dir, 0777, true);
            }

            // Move uploaded file
            if (empty($errors) && move_uploaded_file($_FILES["temppic"]["tmp_name"], $target_file3)) {
            echo "File uploaded successfully: $image_name<br>";
            } else {
            echo "Error: Failed to move uploaded file.<br>";
            $errors["temppic"] = "Upload failed.";
            }
            } else {
            echo "File upload error: " . $_FILES["temppic"]["error"] . "<br>";
            $errors["temppic"] = "Error uploading the file.";
            }
        } else {
            echo "No file uploaded.<br>";
            $errors["temppic"] = "File is required.";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Initialize error message variable
            $agreeError = "";
        
            // Check if 'agree' is set
            if (!isset($_POST['agree'])) {
                $agreeError = "You must select either Yes or No.";
                echo $agreeError;
            } else {
                $agree = $_POST['agree']; // Get the selected value
                // Process the selected value
                if ($agree === "Yes") {
                    echo "<p>You selected 'Yes'.</p>";
                } elseif ($agree === "No") {
                    echo "<p>You selected 'No'.</p>";
                }
            }
        }

        // Database Insertion
        if (empty($errors)) {
            $db = new mydb();
            $con = $db->openCon();

            $result = $db->addUser(
                $con,
                'victim',
                $_POST['VIC_password'],
                $_POST['agree'],
                $_POST["CIV_email"],
                $_POST["CIV_dob"],
                $_POST["CIV_Gender"],
                $_POST["CIV_Lastname"],
                $_POST["CIV_Firstname"],
                $_POST["CIV_NID"],
                $_POST["CIV_phone"],
                $_POST["address"],
                $_POST["Division"],
                $_POST["District"],
                $target_file1,
                $target_file,
                $target_file3
            );

            if ($result) {
                $_SESSION["email"]=$_POST["CIV_email"];
                header("Location: ../Control/Send_Mail.php");

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
    </body>
</html>
