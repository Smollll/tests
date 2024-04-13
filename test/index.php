<?php 
include 'conn.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: solid 1px #888;
            border-radius: 4px;
            background-color: #AFD198;
            margin-top: 20px;
            
           
        }

        h3 {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        button {
    background-color: #4CAF50;
    color: white;
    padding: 15px 30px; 
    border: none;
    border-radius: 6px; 
    cursor: pointer;
    margin-top: 20px;
    display: block;
    margin-left: auto; 
    margin-right: auto; 
    font-size: large;
}
/* for address */
.address-container {
    display: flex;
    flex-direction: column;
}

.address-info {
    display: flex;
}


.address-info input[type="text"],
.address-info select {
    flex: 1;
    margin-right: 10px; /* Add spacing between input elements */
}

.address-info select {
    margin-right: 0; /* Remove margin from the select element */
}

button:hover {
  background-color: #45a049;
}
 
.container {
     display: flex;
     align-items: center;
}  
p {
    margin: 0;
}

a {
     color: blue;
     text-decoration: none;
     margin-left: 5px;
}

     .form-row {
 display: flex;
 justify-content: space-between;
 margin-bottom: 10px;
}

.input-container {
    width: calc(50% - 5px);
}

.input-container input[type="file"] {
    border: 1px solid #000;
    border-radius: 4px;
    border-width: 1px;
    padding: 10px;
    width: 60%;
    box-sizing: border-box;
}

.label-container {
    display: block;
    margin-bottom: 5px;
}
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px; /* Set a maximum width for the modal */
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    overflow: auto; /* Allow modal content to scroll */
}


.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.num{
    max-width: 150px;
}
@media screen and (max-width: 600px) {

form {
max-width: 90%;
margin: 0 auto;
padding: 20px;
margin-left: 10px; /* Add a small left margin */
margin-right: 10px; /* Add a small right margin */
overflow-x: hidden;
}
.form-container {
display: flex;
flex-direction: column;
width: 100%;

}

.form-row {
width: 100%;
display: flex;
flex-direction: column;

margin-bottom: 20px;
}

.input-container {
width: 100%;
}

.input-container label {
margin-bottom: 5px;
}

.input-container input[type="file"] {
width: 100%;
}
.swal2-popup {
font-size: 12px; /* Decrease font size for smaller screens */
max-width: 90%; /* Limit width for smaller screens */
}
.address-info {
        flex-direction: column; /* Change flex direction to column in mobile view */
    }

.address-info input[type="text"],
.address-info select {
    flex: none; /* Reset flex property */
    width: 100%; /* Set width to fill the container */
    margin-bottom: 10px; /* Add spacing between input elements */
    }
p {
    margin: 0;
    font-size: smaller;
   
}

a {
     color: blue;
     text-decoration: none;
     margin-left: 10px;
     font-size: smaller;
     
}
}

    </style>
<body>
    <h1 style="text-align: center;">Application Form</h1>
    <form  method="post" enctype="multipart/form-data">
    <div>
        <h3>Personal Data</h3>
        <div>
            <label for="firstName">Fullname*</label>
            <input type="text" id="firstName" name="firstName" placeholder="First Name" required><br>
        </div>
        <div>
            <label for="email">Email*</label>
            <input type="text" id="email" name="email" placeholder="Email" required><br>
        </div>
        <div>
            <label for="conNum">Contact Number*</label>
            <input class="num" type="tel" id="conNum" name="conNum" placeholder="ex...  0923-456-789" required><br>
        </div>
        <div class="address-container">
    <div>
        <label for="streetAddress">Address</label>
        <input type="text" id="streetAddress" name="streetAddress" placeholder="Street Address" required>
    </div>
    <div class="address-info">
        <input type="text" id="city" name="city" placeholder="City" required>
        <input type="text" id="zipCode" name="zipCode" placeholder="Zipcode" required>
        <input type="text" id="province" name="province" placeholder="Province" required>
    </div>
</div>

    <div class="form-container">
        <h3>Application Document</h3>
        <div class="form-row">
    <div class="input-container">
        <label for="application_letter">Application Letter*</label>
        <input type="file" id="appLetter" name="application_letter" accept="image/*" required value="<?php echo isset($_SESSION['appLetter']) ? $_SESSION['appLetter'] : ''; ?>">
    </div>
    <div class="input-container">
        <label for="curriculum_vitae">Curriculum Vitae*</label>
        <input type="file" id="cv" name="curriculum_vitae" accept="image/*" required value="<?php echo isset($_SESSION['cv']) ? $_SESSION['cv'] : ''; ?>">
    </div>
</div>
<div class="form-row">
    <div class="input-container">
        <label for="picture">2x2 Picture*</label>
        <input type="file" id="picture" name="pic" accept="image/*" required value="<?php echo isset($_SESSION['picture']) ? $_SESSION['picture'] : ''; ?>">
    </div>
    <div class="input-container">
        <label for="valid_id">Valid ID*</label>
        <input type="file" id="valId" name="valid" accept="image/*" required value="<?php echo isset($_SESSION['valId']) ? $_SESSION['valId'] : ''; ?>">
    </div>
</div>

    </div>
<br><br>

<?php

// Define variables and initialize with empty values
$firstName = $email = $conNum = $streetAddress = $city = $zipCode = $province = "";
$errors = array();

// Set session values
$_SESSION['firstName'] = $_POST['firstName'] ?? '';
$_SESSION['email'] = $_POST['email'] ?? '';
$_SESSION['conNum'] = $_POST['conNum'] ?? '';
$_SESSION['streetAddress'] = $_POST['streetAddress'] ?? '';
$_SESSION['city'] = $_POST['city'] ?? '';
$_SESSION['zipCode'] = $_POST['zipCode'] ?? '';
$_SESSION['province'] = $_POST['province'] ?? '';

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate Fullname
    if (empty($_POST["firstName"])) {
        $errors[] = "Fullname is required";
    } else {
        $firstName = test_input($_POST["firstName"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
            $errors[] = "Only letters and white space allowed for Fullname";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Sanitize email address
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
    }

    // Validate Contact Number
    if (empty($_POST["conNum"])) {
        $errors[] = "Contact Number is required";
    } else {
        $conNum = test_input($_POST["conNum"]);
        
        // Validate contact number format
        if (!preg_match("/^\d{11}$/", $conNum)) {
            $errors[] = "Contact Number must be exactly 11 digits";
        }
    }

    // Validate Address
    if (empty($_POST["streetAddress"]) || empty($_POST["city"]) || empty($_POST["zipCode"]) || empty($_POST["province"])) {
        $errors[] = "Address fields are required";
    } else {
        // Sanitize address fields
        $streetAddress = test_input($_POST["streetAddress"]);
        $city = test_input($_POST["city"]);
        $zipCode = test_input($_POST["zipCode"]);
        $province = test_input($_POST["province"]);
    
        // Validate address format
        if (!preg_match("/^[a-zA-Z0-9 .,'-]*$/", $streetAddress) || 
            !preg_match("/^[a-zA-Z0-9 .,'-]*$/", $city) || 
            !preg_match("/^[0-9]*$/", $zipCode) || 
            !preg_match("/^[a-zA-Z ]*$/", $province)) {
            $errors[] = "Invalid address format";
        }
    }

    // If there are no errors, do further processing (e.g., saving to database)
    if (empty($errors)) {
        // Your further processing code here
        
        $currentDate = date('Y-m-d');
    
        // Extract form data
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        $conNum = $_POST['conNum'];
        $streetAddress = $_POST['streetAddress'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $zipCode = $_POST['zipCode'];
    
        // Execute SQL statement
        // Retrieve the ID of the last inserted row
        $last_id = $conn->insert_id;
    
        // Create directories if they don't exist
        $directories = ['application', 'image', 'resume', 'validId'];
        foreach ($directories as $dir) {
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
        }
    
        // Validate and move files
        $appLetter_error = validateAndMoveFile($_FILES['application_letter'], "application/{$last_id}_application_letter_" . $_FILES['application_letter']['name']);
        $cv_error = validateAndMoveFile($_FILES['curriculum_vitae'], "resume/{$last_id}_curriculum_vitae_" . $_FILES['curriculum_vitae']['name']);
        $picture_error = validateAndMoveFile($_FILES['pic'], "image/{$last_id}_picture_" . $_FILES['pic']['name']);
        $valId_error = validateAndMoveFile($_FILES['valid'], "validId/{$last_id}_valid_id_" . $_FILES['valid']['name']);
    
        // If any file upload fails, display error message
        if ($appLetter_error || $cv_error || $picture_error || $valId_error) {
            // Store user input in session variables
            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['conNum'] = $_POST['conNum'];
            $_SESSION['streetAddress'] = $_POST['streetAddress'];
            $_SESSION['city'] = $_POST['city'];
            $_SESSION['zipCode'] = $_POST['zipCode'];
            $_SESSION['province'] = $_POST['province'];
            $_SESSION['appLetter_error'] = $appLetter_error;
            $_SESSION['cv_error'] = $cv_error;
            $_SESSION['picture_error'] = $picture_error;
            $_SESSION['valId_error'] = $valId_error;
            
            // Display error message
            echo $appLetter_error ? "$appLetter_error<br>" : "";
            echo $cv_error ? "$cv_error<br>" : "";
            echo $picture_error ? "$picture_error<br>" : "";
            echo $valId_error ? "$valId_error<br>" : "";
            
        } else {
            // Update the database with file paths
            $sql = "INSERT INTO contbl (firstName,  email, conNum, streetAddress, city, province, zipCode,  date, appLetter, cv, picture, valId) 
                    VALUES ('$firstName',  '$email', '$conNum', '$streetAddress', '$city', '$province', '$zipCode', '$currentDate', 
                            'application/{$last_id}_application_letter_" . $_FILES['application_letter']['name'] . "', 
                            'resume/{$last_id}_curriculum_vitae_" . $_FILES['curriculum_vitae']['name'] . "', 
                            'image/{$last_id}_picture_" . $_FILES['pic']['name'] . "', 
                            'validId/{$last_id}_valid_id_" . $_FILES['valid']['name'] . "')";
    
            if ($conn->query($sql) === FALSE) {
                echo "Error updating file paths: " . $conn->error;
            } else {
                echo "<script>";
                echo "Swal.fire({";
                echo "icon: 'success',";
                echo "title: 'Thank You!!',";
                echo "text: 'Please wait while we process your application.'";
                echo "});";
                echo "</script>";
            }
        }
        
        // Close connection
        $conn->close();
    } else {
        // If there are errors in form submission, display them to the user using SweetAlert2
        $errorMessages = "";
        foreach ($errors as $error) {
            $errorMessages .= "$error<br>";
        }
        
        echo "<script>";
echo "Swal.fire({";
echo "icon: 'error',";
echo "title: 'Oops...',";
echo "html: '$errorMessages'";
echo "});";
echo "document.addEventListener('DOMContentLoaded', function() {";
echo "document.getElementById('firstName').value = '" . $_SESSION['firstName'] . "';";
echo "document.getElementById('email').value = '" . $_SESSION['email'] . "';";
echo "document.getElementById('conNum').value = '" . $_SESSION['conNum'] . "';";
echo "document.getElementById('streetAddress').value = '" . $_SESSION['streetAddress'] . "';";
echo "document.getElementById('city').value = '" . $_SESSION['city'] . "';";
echo "document.getElementById('zipCode').value = '" . $_SESSION['zipCode'] . "';";
echo "document.getElementById('province').value = '" . $_SESSION['province'] . "';";
echo "});";
echo "</script>";
    }
}


// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to handle file upload validation and move
function validateAndMoveFile($file, $destination) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errorMessage = "<script>Swal.fire({
            title: 'Upload Error',
            text: 'Failed to upload file. Error code: " . $file['error'] . "',
            icon: 'error'
        });</script>";
        return $errorMessage;
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowedExts = array('jpeg', 'jpg', 'png');
    if (!in_array($ext, $allowedExts)) {
        $errorMessage = "<script>Swal.fire({
            title: 'Invalid File Extension',
            text: 'Allowed extensions: " . implode(', ', $allowedExts) . "',
            icon: 'error'
        });</script>";
        return $errorMessage;
    }

    $allowedMimeTypes = array('image/jpeg', 'image/pjpeg', 'image/png');
    if (!in_array($file['type'], $allowedMimeTypes)) {
        $errorMessage = "<script>Swal.fire({
            title: 'Invalid MIME Type',
            text: 'Allowed MIME types: " . implode(', ', $allowedMimeTypes) . "',
            icon: 'error'
        });</script>";
        return $errorMessage;
    }

    // Move uploaded file to destination directory
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        $errorMessage = "<script>Swal.fire({
            title: 'File Move Error',
            text: 'Failed to move uploaded file',
            icon: 'error'
        });</script>";
        return $errorMessage;
    }

    return null; // File is valid and moved successfully
}
?>

<div class="container">
    
        <p>Please read and Agree to the:</p>
        <a href="#" id="terms-link">Terms and Conditions</a>

        <div class="modal" id="terms-modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Terms and Conditions</h2>
                <p>Donec lobortis metus eget ligula cursus, sodales suscipit metus imperdiet.</p>

                <label for="accept-terms-checkbox">
                    <input type="checkbox" id="accept-terms-checkbox"> I accept the terms and conditions
                </label>
            </div>
        </div>
    </div>
    <br>
    <br>
    <form id="application-form">
        <button type="submit" id="submit-btn">Submit Application</button>
        
    </form>

    <script>

        document.getElementById('terms-link').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('terms-modal').style.display = 'block';
        });

        document.getElementsByClassName('close')[0].addEventListener('click', function() {
            document.getElementById('terms-modal').style.display = 'none';
        });

        document.getElementById('accept-terms-checkbox').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('terms-modal').style.display = 'none';
            }
        });

        document.getElementById('submit-btn').addEventListener('click', function(event) {
            if (!document.getElementById('accept-terms-checkbox').checked) {
                event.preventDefault();
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Please read the Terms and Condition!",
                });
            }
        });
    </script>


    <script src="script.js"></script>





</body>
</html>