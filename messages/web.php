 <?php
$servername = "localhost";
$username = "root";
$password = "";
$db="myapp";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";




// Create database



//to retrieve dat via post as post has no limitation to number of chars & can send mp3 files etc

// retrieve the form data by using the element's name attributes value as key

echo '<h2>form data retrieved by using the $_REQUEST variable<h2/>';

$message = $_REQUEST['msg'];


// display the results
//echo 'Your name is ' . $lastname .' ' . $firstname;



$sql = "INSERT INTO my_messages (time_of_sending, date_of_sending, content)
VALUES (curtime(), curdate(), '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>