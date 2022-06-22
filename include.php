<?php

if(isset($_POST['submit'])) {
    if($emailError == "" && $streetError == "" && $streetnumberError == "" && $cityError == "" && $zipcodeErorr  == "") {
        echo "<h3 color = #FF0001> <b>You have sucessfully registered</b> </h3>";
        echo "<h2>Your Input:</h2> email address: ".$email."<br> street name: ".$street."<br> street No: ".$streetnumber."<br>city name: ".$city. "<br> post code: ".$zipcode;
    } else {
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";
    }
}
