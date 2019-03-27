 <?php
$servername = "localhost";
$username = "students";
$password = "students";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";




// Create database
$sql1 = "CREATE DATABASE myapp";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


$sql2 = "CREATE TABLE my_messages(
time_of_sending datetime,
date_of_sending datetime,
content varchar
)";



//to retrieve dat via post as post has no limitation to number of chars & can send mp3 files etc


if ( isset( $_POST['submit'] ) ) {

// retrieve the form data by using the element's name attributes value as key

echo '<h2>form data retrieved by using the $_REQUEST variable<h2/>'

$message = $_REQUEST['msg'];


// display the results
//echo 'Your name is ' . $lastname .' ' . $firstname;



$sql = "INSERT INTO my_messages (time_of_sending, date_of_sending, content)
VALUES ('curtime()', 'curdate()', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}












?>
