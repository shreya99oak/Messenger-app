
 <?php
session_start();


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

$email=$_REQUEST['email'];
$password=$_REQUEST['password'];





   $sql = 'SELECT name, email, password FROM users';
 	$result = $conn->query($sql);
	
     
   
   while($row = $result->fetch_assoc()) {
        if($row['email']==$email)
        {
        	if($row['password']==$password)
        	{
        		$_SESSION['myname'] = $row['name'];
        		header('Location: ../contacts/my_contact.php');
				exit;
        	}
        }
    }
   
   echo "Fetched data successfully\n";
   





?>