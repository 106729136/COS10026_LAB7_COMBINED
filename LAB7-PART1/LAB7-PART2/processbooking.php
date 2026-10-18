<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking Confirmation</title>
    <!-- add other meta -->
</head>
<body>
    <header>
        <h1>Rohirrim Tour Booking Confirmation </h1>
    </header>

    <?php 
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST["firstname"])){
        $err_msg = ""; 
        $first_name = $_POST["firstname"];
        $last_name = $_POST["lastname"];
        $age = $_POST["age"];
        $party_size = $_POST["partysize"];


            //For first name
            if (trim($first_name) == "") 
                $err_msg .= "<p>Please enter your first name.</p>";
            else {
                $first_name = sanitise_input($first_name);
                if (!preg_match("/^[a-zA-Z]{2,40}$/", $first_name)) {
                    $err_msg .= "<p>First name must be 2-40 characters long and contain only letters.</p>";
                }
            }

            //last name 
            if (trim($last_name) == "") 
                $err_msg .= "<p>Please enter your last name.</p>";
            else {
                $last_name = sanitise_input($last_name);
                if (!preg_match("/^[a-zA-Z]{2,40}$/", $last_name)) {
                    $err_msg .= "<p>Last name must be 2-40 characters long and contain only letters.</p>";
                }
            }


            //age
            if(trim($age) == "") 
                $err_msg .= "<p>Please enter your age.</p>";
            else {
                $age = sanitise_input($age);
                if (!preg_match("/^[0-9]{1,3}$/", $age)) {
                    $err_msg .= "<p>Age must be a number between 1 and 3 digits.</p>";
                }
            }

            //Party size
            if (trim($party_size) == "") 
                $err_msg .= "<p>Please enter your party size.</p>";
            else {
                $party_size = sanitise_input($party_size);
                if (!preg_match("/^([1-9]|10)$/", $party_size)) {
                    $err_msg .= "<p>Party size must be between 1 and 10.</p>";
                }
            }

            //Species 
            if (!isset($_POST["species"])) {
                $err_msg .= "<p>Please select a species.</p>";
            } else {
                $species = sanitise_input($_POST["species"]);
                if (!preg_match("/^[MDEH]$/", $species)) {
                    $err_msg .= "<p>Invalid species selected.</p>";
                }
            }

            //Booking 
            $accom = isset($_POST["accom"]);
            $four_day = isset($_POST["4day"]);
            $ten_day = isset($_POST["10day"]);

            if (!$accom && !$four_day && !$ten_day) {
            $err_msg .= "<p>Please select at least one booking option.</p>";
            } 

            if ($accom && $_POST["accom"] !== "Accomodation") {
            $err_msg .= "<p>Invalid accommodation option.</p>";
            }

            if ($four_day && $_POST["4day"] !== "4day") {
            $err_msg .= "<p>Invalid 4 Day Tour option.</p>";
            }

            if ($ten_day && $_POST["10day"] !== "10day") {
            $err_msg .= "<p>Invalid 10 Day Tour option.</p>";
            }


            //Menu preference
            if (!isset($_POST["food"])) {
                $err_msg .= "<p>Please select your menu preference.</p>";
            }
            else {
                $food = sanitise_input($_POST["food"]);

                if (!in_array($food, ["none", "lembas", "mushrooms", "ent", "cram"])) {
                    $err_msg .= "<p>Invalid menu preference.</p>";
                }
            }


            //Booking date
            if (!isset($_POST["bookday"]) || trim($_POST["bookday"]) == "") {
            $err_msg .= "<p>Please enter your booking date.</p>";
            }
            else {
                $bookday = sanitise_input($_POST["bookday"]);
                if (!preg_match("/^\d{2}-\d{2}-\d{4}$/", $bookday)) {
                    $err_msg .= "<p>Booking date must be in the format DD-MM-YYYY.</p>";
                }
            }


            if ($err_msg != "") {
            echo "<h2>Booking unsuccessful</h2>";
            echo $err_msg;
            }
            else {
            echo "<p>Welcome $first_name $last_name !</p>";
            echo "<p>You are now booked on the ";

            if ($accom) {
                echo "<p>Accomodation</p>";
            }
            if ($four_day) {
                echo "<p>4 Day Tour</p>";
            }
            if ($ten_day) {
                echo "<p>10 Day Tour</p>";
            }


            if ($species == "M") {
                echo "<p>Species: Human</p>";
            }
            elseif ($species == "D") {
                echo "<p>Species: Dwarf</p>";
            }
            elseif ($species == "E") {
                echo "<p>Species: Elf</p>";
            }
            elseif ($species == "H") {
                echo "<p>Species: Hobbit</p>";
            }

            echo "<p>Age: $age</p>";
            echo "<p>Meal preference: $food</p>";
            echo "<p>Number of travellers: $party_size</p>";
            echo "<p>Booking Date: $bookday</p>";
            }


    }
