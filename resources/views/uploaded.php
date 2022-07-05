<?php
$filename=$_FILES['file']['name'];

$location="upload/".$filename;

if( move_uploaded_file($_FILES['file']['name'], $location)){
	echo "success";
}else{
	echo "faild";
}
?>