<?php
	include_once 'connect.php';	
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		//header('Location: '.$url);
		//print_r($_POST);
		$fullname 	= $_POST["fullname"] ;
		$mob 		= $_POST["mob"]; 
		$age 		= $_POST["age"] ;
		$dob 		= $_POST["dob"];
		$gender 	= $_POST["gender"] ;
		$desc 		= $_POST["desc"] ;
	
		if (!$conn) {
			//die("Connection failed: " . mysqli_connect_error());
			echo "connection failed";
		} else{
			$dbcreate_sql = "create database if not exists mytestDB";
			if (mysqli_query($conn, $dbcreate_sql)) {
				
				$create_sql = "create table if not exists mytestDB.patient_info(id int(25) PRIMARY KEY NOT NULL AUTO_INCREMENT,fullname text NOT NULL,`gender` text NOT NULL,`age` text NOT NULL,`dob` text NOT NULL,`mob` text NOT NULL,`add_desc` text NOT NULL)";
				if(mysqli_query($conn, $create_sql)) {
					$sql = "insert into mytestDB.patient_info(fullname, gender,age, dob,mob,add_desc) values('".$fullname."','".$gender."','".$age."','".$dob."','".$mob."','".$desc."')";
					
					if(mysqli_query($conn, $sql)){
						echo "inserted";
					}else {
						//echo "Error in insertion !!" . mysqli_error($conn);
					}
				}else{
					//echo "Error in table creation !!" . mysqli_error($conn);
				}		
			
			} else {
				//echo "Error creating database: " . mysqli_error($conn);
			}
			
		}
	}	
				
?>
