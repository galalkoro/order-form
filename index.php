<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);


}

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Your favourite drink', 'price' => 2.5],
    ['name' => 'Your favourite drink', 'price' => 2.5],
    ['name' => 'Your favourite drink', 'price' => 2.5],
    ['name' => 'Your favourite drink', 'price' => 2.5],


];

$totalValue = 0;

 function validate(){
    // define variables to empty values
    $emailError = $streetError = $streetnumberError = $cityError = $zipcodeError = "";
    $email = $street = $streetnumber = $city = $zipcode = "";
    // TODO: This function will send a list of invalid fields back
     $error = [];

    //Input fields validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Email Validation
        if (emptyempty($_POST["email"])) {
            $emailError = "Email is required";
        } else {
            $email = input_data($_POST["email"]);
            // check that the e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format";
            }
        }

        //Street Validation
        if (emptyempty($_POST["street"])) {
            $streetErrorErr = "Name is required";
        } else {
            $street = input_data($_POST["street"]);
            // check if street name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$street)) {
                $streetError = "Only alphabets and white space are allowed";
            }
        }

        //Number street Validation
        if (emptyempty($_POST["streetnumber"])) {
            $streetnumberError = "street number is required";
        } else {
            $streetnumber = input_data($_POST["streetnumber"]);
            // check if street number is well-formed
            if (!preg_match ("/^[0-9]*$/", $streetnumber) ) {
                $streetnumberError = "Only numeric value is allowed.";
            }
            //check street number length should not be less and greater than 4
            if (strlen ($streetnumber) != 4) {
                $streetnumberError = "street no must contain 4 digits.";
            }
        }


        //city name  Validation
        if (emptyempty($_POST["city"])) {
            $cityError = "Name is required";
        } else {
            $city = input_data($_POST["city"]);
            // check if city name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
                $cityError = "Only alphabets and white space are allowed";
            }
        }

        //zipcode Validation
        if (emptyempty($_POST["zipcode"])) {
            $zipcodeError = "post code number is required";
        } else {
            $zipcode = input_data($_POST["zipcode"]);
            // check if mobile no is well-formed
            if (!preg_match ("/^[0-9]*$/", $zipcode) ) {
                $zipcodeError = "Only numeric value is allowed.";
            }
            //check zipcode number length should not be less and greater than 4
            if (strlen ($zipcode) != 4) {
                $zipcodeError = "zipcode number must contain 4 digits.";
            }
        }

    }

    if (emptyempty($error)){
        return $error;
    }
      // return [];

     function input_data($data): string
     {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
     }
 }



function handleForm()
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission

        if(isset($_POST['submit'])) {
            $emailError = $streetError = $streetnumberError = $cityError = $zipcodeError = "";
            $email = $street = $streetnumber = $city = $zipcode = "";

            if($emailError == "" && $streetError == "" && $streetnumberError == "" && $cityError == "" && $zipcodeError  == "") {

                echo "<h3 color = #FF0001> <b>You have successfully registered</b> </h3>";
                echo "<h2>Your Input:</h2> email address: ".$email."<br> street name: ".$street."<br> street No: ".$streetnumber."<br>city name: ".$city. "<br> post code: ".$zipcode;
            } else {
                echo "<h3> <b>You didn't fille up the form correctly.</b> </h3>";
            }
        }
    }
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm();
}

require 'form-view.php';
