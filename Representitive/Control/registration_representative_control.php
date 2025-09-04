<html>
    <head>
        <title>Registration Control Panel</title>
    </head>
    <?php include '../Model/REP_Db.php'; ?>
    <body>
        Welcome
        <?php 
        $errors = [];
        $REP_DOB = false;
        $upload_dir = '../Uploads/';
        $Images_dir = '../Images/';

        // Validate First Name
        if (!empty($_POST["REP_Firstname"]) && ctype_alpha($_POST["REP_Firstname"])) {
            echo $_POST["REP_Firstname"];
        } else {
            echo "First Name should only contain alphabets.<br>";
            $errors["REP_Firstname"] = "Invalid";
        }

        // Validate Last Name
        if (!empty($_POST["REP_Lastname"]) && ctype_alpha($_POST["REP_Lastname"])) {
            echo " " . $_POST["REP_Lastname"];
        } else {
            echo "Last Name should only contain alphabets.<br>";
            $errors["REP_Lastname"] = "Invalid";
        }

        echo "<br>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Initialize error message variable
            $passError = "";
        
            // Get the password input from the form
            $password = $_POST['REP_password'];
        
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
        if (isset($_POST["REP_gender"])) {
            echo $_POST["REP_gender"] . "<br>";
        } else {
            echo "Please select at least one gender.<br>";
            $errors["REP_gender"] = "Invalid";
        }



        // Validate Date of Birth
        if (!empty($_POST["REP_DOB"])) {
            $dateParts = explode('-', $_POST["REP_DOB"]);
            if (count($dateParts) == 3 && checkdate((int)$dateParts[1], (int)$dateParts[2], (int)$dateParts[0])) {
                echo "Date of Birth: " . $_POST["REP_DOB"] . "<br>";
                $REP_DOB = true;
            } else {
                echo "Please enter a valid date in the format YYYY-MM-DD.<br>";
                $errors["REP_DOB"] = "Invalid";
            }
        } else {
            echo "Please enter a valid date of birth.<br>";
            $errors["REP_DOB"] = "Invalid";
        }

        // Validate Phone Number
        if (preg_match('/^0[0-9]+$/', $_POST["REP_Phn_no"])) {
            echo $_POST["REP_Phn_no"];
        } else {
            echo "Phone number must start with 0 and contain only numbers.<br>";
            $errors["REP_Phn_no"] = "Invalid";
        }

        echo "<br>";

        // Validate Email Address
        if (!empty($_POST["REP_email"]) && preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/', $_POST["REP_email"])) {
            echo $_POST["REP_email"];
        } else {
            echo "Email address is required and must contain '@' and end with '.com'.<br>";
            $errors["REP_email"] = "Invalid";
        }

        echo "<br>";

        // Validate Division
        if (isset($_POST["REP_Division"])) {
            echo $_POST["REP_Division"] . "<br>";
        } else {
            echo "Please select at least one division.<br>";
            $errors["REP_Division"] = "Invalid";
        }

        // Validate District
        if (isset($_POST["REP_District"])) {
            echo $_POST["REP_District"] . "<br>";
        } else {
            echo "Please select at least one district.<br>";
            $errors["REP_District"] = "Invalid";
        }

       // Validate NID
       if (preg_match('/^[0-9]{13}$/', $_POST["REP_nid"])) 
       {
        echo $_POST["REP_nid"];
       } 
    else 
    {
        echo "NID must contain exactly 13 digits.<br>";
        $errors["REP_nid"] = "Invalid";
    }
    echo "<br>";

        // validate workng category
        if (isset($_POST["Working_Catagory"])) 
        {
            echo $_POST["Working_Catagory"] . "<br>";
        } 
        else 
        {
            echo "Please enter a valid working category.<br>";
            $errors["Working_Catagory"] = "Invalid";
        }




        // File validation function
         if (isset($_FILES["REP_img"])) {
            if ($_FILES["REP_img"]["error"] === UPLOAD_ERR_OK) {
            $image_name = basename($_FILES["REP_img"]["name"]);
            $target_file1 = $Images_dir . $image_name;

            // Check file type
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            $file_type = mime_content_type($_FILES["REP_img"]["tmp_name"]);
            if (!in_array($file_type, $allowed_types)) {
            $errors["REP_img"] = "Only JPEG, PNG, and GIF files are allowed.";
            }

            // Check file size (limit to 5MB)
            if ($_FILES["REP_img"]["size"] > 5 * 1024 * 1024) {
            $errors["REP_img"] = "File size must not exceed 5MB.";
            }

            // Create directory if it doesn't exist
            if (!is_dir($Images_dir)) {
            mkdir($Images_dir, 0777, true);
            }

            // Move uploaded file
            if (empty($errors) && move_uploaded_file($_FILES["REP_img"]["tmp_name"], $target_file1)) {
            echo "File uploaded successfully: $image_name<br>";
            } else {
            echo "Error: Failed to move uploaded file.<br>";
            $errors["REP_img"] = "Upload failed.";
            }
            } else {
            echo "File upload error: " . $_FILES["REP_img"]["error"] . "<br>";
            $errors["REP_img"] = "Error uploading the file.";
            }
        } else {
            echo "No file uploaded.<br>";
            $errors["REP_img"] = "File is required.";
        }


        // Validate uploaded CV
        if (isset($_FILES["REP_CV"])) {
            if ($_FILES["REP_CV"]["error"] === UPLOAD_ERR_OK) {
                $cv_name = basename($_FILES["REP_CV"]["name"]);
                $target_file = $upload_dir . $cv_name;

                
                $allowed_types = ['application/pdf'];
                $file_type = mime_content_type($_FILES["REP_CV"]["tmp_name"]);
                if (!in_array($file_type, $allowed_types)) {
                    $errors["REP_CV"] = "Only PDF files are allowed.";
                }

                
                if ($_FILES["REP_CV"]["size"] > 5 * 1024 * 1024) {
                    $errors["REP_CV"] = "File size must not exceed 5MB.";
                }

                
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true); 
                }

                
                if (empty($errors) && move_uploaded_file($_FILES["REP_CV"]["tmp_name"], $target_file)) {
                    echo "File uploaded successfully: $cv_name<br>";
                } else {
                    echo "Error: Failed to move uploaded file.<br>";
                    $errors["REP_CV"] = "Upload failed.";
                }
            } else {
                echo "File upload error: " . $_FILES["REP_CV"]["error"] . "<br>";
                $errors["REP_CV"] = "Error uploading the file.";
            }
        } else {
            echo "No file uploaded.<br>";
            $errors["REP_CV"] = "File is required.";
        }

        // Database Insertion
        if (empty($errors)) {
            $db = new mydb();
            $con = $db->openCon();

            $result = $db->addUser(
                $con,
                'representitive',
                $_POST["REP_email"],
                $_POST["REP_password"],
                $_POST["REP_DOB"],
                $_POST["REP_gender"],
                $_POST["REP_Lastname"],
                $_POST["REP_Firstname"],
                $_POST["REP_nid"],
                $_POST["REP_Division"],
                $_POST["REP_District"],
                $_POST["REP_Phn_no"],
                $_POST["Working_Catagory"],
                $target_file1,
                $target_file

                

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
    </body>
</html>
