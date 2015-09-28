<?php
ob_start();
session_start();
require_once('ImageManipulator.php');
include('config.php');
 $title=$_POST['title']; 
 $name=$_POST['name']; 
 $file=$_POST['file'];
 $firstname =$_SESSION['SESS_FIRST_NAME'];
 $semail=$_SESSION['SESS_EMAIL'];
 $verb='wrote a testimonial';
 $description= $_POST['description'];
 $board_type= $_POST['board'];
 $visitor_id=$_SESSION['SESS_MID'];
$fullname=$_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];
 
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 100000)
&& in_array($extension, $allowedExts)) {
  
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("../../../../image/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../../../../image/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "../../../../image/" . $_FILES["file"]["name"];
    }
  
} else {
  echo "Invalid file";
}


// array of valid extensions
    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension = strrchr($_FILES['file']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension, $validExtensions)) {
        $newNamePrefix = time() . '_';
        $manipulator = new ImageManipulator($_FILES['file']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 250; // 200 / 2
        $y1 = $centreY - 166.5; // 130 / 2
 
        $x2 = $centreX + 250; // 200 / 2
        $y2 = $centreY + 166.5; // 130 / 2
 
        // center cropping to 200x130
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('thumbnail/' . $_FILES['file']['name']);
		$savename= $_FILES['file']['name'];
		
		
		$qry_myfriends=mysql_query("SELECT m_id FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1'))");
		$id_string =',';
		while($result_myfriends=mysql_fetch_array($qry_myfriends))
		{
		$id_string = $id_string.$result_myfriends['m_id'].',';
		}
		
		
		 mysql_query("INSERT INTO `posts`(title,name,s_name,imgname,description,s_email,stream_id,date_posts) VALUES ('$title', '$name','$fullname','$savename','$description','$semail','$id_string',now())"); 
  
  $qry_test=mysql_query("select pid from posts order by pid desc limit 1");
$result_test=mysql_fetch_array($qry_test);
$pid=$result_test['pid'];
mysql_query("INSERT INTO `tbl_activity`(s_id,s_name,r_name,verb,imgname,activity_id,p_id,date) VALUES (' $visitor_id','$fullname','$name','$verb','$savename','$id_string','$pid',now())"); 

 mysql_query("INSERT INTO `board_pin`(board_name,testimonial_id) VALUES ('$board_type','{$result_test['pid']}')"); 
		$var="location: testimonial.php?id=".$result_test['pid'];
        header($var);
    } else {
        echo 'You must upload an image...';
    }


 
 ?>
 
 