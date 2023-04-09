
<?php

session_start();  //Redis Session 



// Declaring Mongo url
$db_url = "mongodb+srv://karthick2020:<Kick@2002>@cluster0.urgesls.mongodb.net/?retryWrites=true&w=majority";

// Connecting to MongoDB 
$client = new MongoDB\Client($db_url);

// Checking the status of connection request
if (!$client) {
    echo "Unable to connect to Database";
}


// Selecting the database
$db_name = $client-> InternTask;
if (!$db_name) {
    echo "Error in creating database Intern task";
}


// Selecting or creating a collection if it doesn't exist
$collection  = $db_name->userData;
if (!$collection) {
    echo "Error in creating collection userData";
}

// $email = "ask!@gmail.com";
$email = $_POST['email'];


$document = $collection->findOne(['email' => $email]);

if ($document) {
    $result = json_encode($document->getArrayCopy());
    echo $result;
}

?>