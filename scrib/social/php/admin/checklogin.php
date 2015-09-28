<?php  
include 'config.php';
?>
<?php
//Start the Session
session_start();

//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = md5($_POST['password']);
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
 
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
//3.1.2 If the posted values are equal to the database values, thesn session will be created for the user.
if ($count == 1){
header("Location: /scrib/social/php/admin/main_timeline.php");
$_SESSION['username'] = $username;
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "Hi " . $username . "";
echo "This is the Members Area";
echo "<a href='logout.php'>Logout</a>";

 }
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
echo "Invalid Login Credentials.";
}
}
else{echo"not logged in";}
//3.1.4 if the user is logged in Greets the user with message

//3.2 When the user visits the page first time, simple login form will be displayed.
?>