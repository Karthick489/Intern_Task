
<?php

session_start();  // Redis Session

// Declaring Mongo url
$db_url = "mongodb+srv://karthick2020:<Kick@2002>@cluster0.urgesls.mongodb.net/?retryWrites=true&w=majority";

// Connecting to MongoDB 
$client = new MongoDB\Client($db_url);

// Checking the status of connection request
if (!$client) {
    echo "Unable to connect to Database";
}

// Selecting the database
$db_name = $client->guviInternship;
if (!$db_name) {
    echo "Error in creating database Intern Task";
}

// Selecting or creating a collection if it doesn't exist
$collection  = $db_name->userData;
if (!$collection) {
    echo "Error in creating collection userData";
}

// Updating Data from form
$fullname = $_POST['fullname'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$work = $_POST['work'];

$userupdate = array(
    '$set' => array(
        "name" => $fullname,
        "age" => $age,
        "phone" => $phone,
        "address" => $address,
        "work" => $work
    )
);

$email = $_POST['email'];

$condition = array("email" => $email);

if ($collection->updateOne($condition, $userupdate)) {
    echo "Record Updated Successfully";
} else {
    echo "User not found";
}
