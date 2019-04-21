

 <?php
$servername = "localhost";
$username = "root";
$password = "";
$db="login";
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

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];

// display the results
//echo 'Your name is ' . $lastname .' ' . $firstname;



$sql = "INSERT INTO users (name,email,password)
VALUES ('$name','$email','$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


header('Location: login.html');
exit;


?>