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

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>



<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!--external files-->











	<link rel="stylesheet" type="text/css" href="my_contact.css">
	<script type="text/javascript" src="my_contact.js"></script>

</head>
<body>


<nav role="navigation">
  <div id="menuToggle">

    <input type="checkbox" />
   
    <span></span>
    <span></span>
    <span></span>





    <ul id="menu">






<div id="circle"><div>This is a circular div</div></div>


<br>
      <a href="#"><li>Hi, 
      	<?php
      	session_start();
		$name = $_SESSION['myname'];

       	echo $name ; 
       ?>
       	
       </li></a>
      <a href="#"><li>Profile</li></a>
      <a href="#"><li>Info</li></a>
      <a href="#"><li>Contact</li></a>
     
    </ul>
  </div>
  <input type="text" id="search" placeholder="Search Friend..">
</nav>

<br>
<br>

<div>
	
<table>
<?php
$sql = 'SELECT name FROM users';
 	$result = $conn->query($sql);
   
   while($row = $result->fetch_assoc()) {
   
 if($row['name']!=$name)   { 
 	
 	
	echo "<tr>";
	echo '<td id="btn1" class="btn btn-primary" data-toggle="modal"
	        data-target="#fsModal">'. $row['name'] . "</td>";
	echo "</tr>";
	}

}
   	
    ?>

</table>












</div>


 
<script>
	
var cells = document.getElementsByTagName('td');
for(var i = 0; i <= cells.length; i++){
    cells[i].addEventListener('click', clickHandler);
}

function clickHandler()
{
    var friendname=this.textContent;

	console.log(friendname);
    document.getElementById('title').innerHTML=friendname;
     $.ajax({
                    type: "POST",
                    url: 'my_contact.php',
                    data: { friendname : friendname }
                });
}

</script>













<!-- Modal -->
<div id="fsModal"
     class="modal animated bounceIn"
     tabindex="-1"
     role="dialog"
     aria-labelledby="myModalLabel"
     aria-hidden="true">

  <!-- dialog -->
  <div class="modal-dialog">

    <!-- content -->
    <div class="modal-content">

      <!-- header -->
      <div class="modal-header">
      	<h2 id="title" style="text-align: center;"></h2>


      </div>
      <!-- header -->
      
      <!-- body -->
      <div class="modal-body">

      	<?php

			if(isset($_POST['friendname']))
			{
			    $friend = $_POST['friendname'];
			    //echo $friend;
			  
			


			$sql="CREATE TABLE `".$name."".$friend."` ( name VARCHAR(30), time_of_sending DATETIME, date_of_sending DATETIME, message VARCHAR(300))";
			$sql1="CREATE TABLE `".$friend."".$name."` ( name VARCHAR(30), time_of_sending DATETIME, date_of_sending DATETIME, message VARCHAR(300))";


			if ($conn->query($sql) === TRUE) {
			    echo "Table created successfully";
			} else {
			    echo "Error creating table: " . $conn->error;
			}

			if ($conn->query($sql1) === TRUE) {
			    echo "Table created successfully";
			} else {
			    echo "Error creating table: " . $conn->error;
			}

					}
		?>



























      </div>
  
      <div class="modal-footer">
      	<div>
      		<form action="my_contact.php" method="post">
	      		<input type="submit"value="Send" style="float: right" />
				<div style="overflow: hidden; padding-right: .5em;">
				   <input type="text" name="msg" value="Type your message..." style="width: 100%;" />
				</div>
			</form>

			<?php 

				$msg=$_REQUEST['msg'];

				$sql = "INSERT INTO `".$name."".$friend."` (name,time_of_sending, date_of_sending, message)
				VALUES ('$name',curtime(), curdate(), '$msg')";

			?>









      	</div>

      
        
      </div>
      

    </div>
    <!-- content -->

  </div>
  <!-- dialog -->

</div>
<!-- modal -->












</body>
</html>





















