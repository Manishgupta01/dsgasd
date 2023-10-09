<?php

// define variables and set to empty values
$fnameErr = $lnameErr = $DstartErr = $emailErr = $phonenoErr = $choose_file = $addressErr =  $zipErr = "";

$fname = $lname = $Dstart = $email = $phoneno = $choose_file = $address = $zip = $gender_name = $language = $inputState = $inputCity  = "";

if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
    } else {
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $fnameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "First Name is required";
    } else {
        $lname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $lnameErr = "Only letters and white space allowed";
        }
    }


    if (empty($_POST["Dstart"])) {
        $DstartErr = "Date is required";
    } else {
        $$Dstart = test_input($_POST["Dstart"]);
        // check if name only contains letters and whitespace
        if (preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]*$/",$Dstart)) {
            $DstartErr = "Only letters and white space allowed";
        }
    }


    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["phoneno"])) {
        $phonenoErr = "phone Number is required";
    } else {
        $phoneno = test_input($_POST["phoneno"]);
        // check if name only contains letters and whitespace
        if (!preg_match('/^[0-9]*$/', $phoneno)) {
            $phonenoErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["choose_fileErr"])) {
        $choose_fileErr = "Chosse file is required";
    } else {
        $choose_file = test_input($_POST["choose_file"]);
        // check if name only contains letters and whitespace
        if (!preg_match('~[^A-Za-z0-9_\./\]~', $choose_file)) {
            $choose_fileErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $address)) {
            $addressErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["zip"])) {
        $zipErr = "zipCode is required";
    } else {
        $zip = test_input($_POST["zip"]);
        // check if name only contains letters and whitespace
        if (!preg_match('/^[0-9]*$/',  $zip)) {
            $zipErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["gender_name"])) {
        $gender_nameErr = "Gender is required";
    } else {
        $gender_name = test_input($_POST["gender_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $gender_name)) {
            $gender_nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["language"])) {
        $languageErr = "language is required";
    } else {
        $language = test_input($_POST["language"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $language)) {
            $languageErr = "Only letters and white space allowed";
        }
    }

    //         if (empty($_POST["inputState"])) {
    //             $inputStateErr = "language is required";
    //         } else {
    //             $inputState = test_input($_POST["inputState"]);
    //             // check if name only contains letters and whitespace
    //             preg_match("'<select id=\"current-statement\" name=\"inputState\" data-reactid=\".4.2.2.1.0.2.1.1.0\">(.*?)</select>'", $content, $match);

    // if($match) echo "result=".$match[1];
    //         }

    //         if (empty($_POST["language"])) {
    //             $languageErr = "language is required";
    //         } else {
    //             $language = test_input($_POST["language"]);
    //             // check if name only contains letters and whitespace
    //             if (!preg_match("/^[a-zA-Z-' ]*$/", $language)) {
    //                 $languageErr = "Only letters and white space allowed";
    //             }
    //         }

    //     if (empty($_POST["comment"])) {
    //         $comment = "";
    //     } else {
    //         $comment = test_input($_POST["comment"]);
    //     }

    //     if (empty($_POST["gender"])) {
    //         $genderErr = "Gender is required";
    //     } else {
    //         $gender = test_input($_POST["gender"]);
    //     }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $Dstart = $_POST['Dstart'];
  $email = $_POST['email'];
  $phoneno = $_POST['phoneno'];
  $choose_file = $_FILES['choose_file'];
  $address = $_POST['address'];
  $zip = $_POST['zip'];
//   $gender_name = $_POST['gender_name'];
//   $language = $_POST['language'];

  if (isset($_REQUEST['gender_name'])){
    $gander=$_REQUEST['gender_name'];     
}

if (isset($_REQUEST['language'])){
    $gander=$_REQUEST['language'];     
}
//   $gender_name = $_POST['gender_name'];

//   $language = $_POST['language'];


  $sql = "INSERT INTO registration_from (fname, lname, Dstart, email, phoneno, address, zip, gender_name, language )
   VALUES ('$fname', '$lname', '$Dstart', '$email', '$phoneno', '$address', '$zip' ,'$gender_name', '$language' )";


  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Your entry has been submited sucessfully!  </strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong> we are facing some tecnical issue and entry was not submited sucessfully! we are gregate 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
}



