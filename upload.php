<?php 
	
//importing dbDetails file 
include 'dbDetails.php';	

//this is our upload folder 
$upload_path = 'uploads/';

//Getting the server ip 
$server_ip = gethostbyname(gethostname());

//creating the upload url 
$upload_url = 'http://'.$server_ip.'/serverimage/'.$upload_path; 
	
//getting name from the request 
$name = $_REQUEST['name'];


					
//getting file info from the request 
$fileinfo = pathinfo($_FILES["url"]["name"]);

//getting the file extension 
$extension = $fileinfo["extension"];

//file url to store in the database 
$file_url = $upload_url . $name . '.' . $extension;

//file path to upload in the server 
$file_path = $upload_path . $name . '.'. $extension; 
			
//saving the file 
move_uploaded_file($_FILES["url"]["tmp_name"],$file_path);


$sql = "INSERT INTO image (name,url) VALUES ('$name','$file_url')";
//echo $sql;
//exit;
$ex=mysqli_query($con,$sql);
			
//closing the connection 
mysqli_close($con);

?>