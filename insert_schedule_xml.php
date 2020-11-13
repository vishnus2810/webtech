<?php


$patientname=$_POST['name'];
$patientemail=$_POST['email'];
$doctorname=$_POST['doctor'];
$department=$_POST['department'];
$date=$_POST['date'];
$phone=$_POST['phone'];
$message=$_POST['message'];

//insert into xml document
appendPatient("patientname",$patientname);
appendPatient("patientemail",$patientemail);
appendPatient("doctorname",$doctorname);
appendPatient("department",$department);
appendPatient("date",$date);
appendPatient("phone",$phone);
appendPatient("message",$message);



function appendPatient($tag,$data){
	$xdoc = new DomDocument;
	$xdoc->Load('schedule.xml');
	$schedule = $xdoc->getElementsByTagName('schedule')->item(0);
	$newElement = $xdoc ->createElement($tag);
	$txtNode = $xdoc ->createTextNode ($data);
	$newElement -> appendChild($txtNode);
	$schedule -> appendChild($newElement);
	$test = $xdoc->save("schedule.xml");
}


	function get_data() { 
		
		$file_name='schedule'. '.json'; 

		if(file_exists("$file_name")) { 
			$current_data=file_get_contents("$file_name"); 
			$array_data=json_decode($current_data, true); 
							
			$extra=array( 
				'patientname' => $_POST['name'], 
				'patientemail' => $_POST['email'], 
				'doctorname' => $_POST['doctor'], 
				'department' => $_POST['department'], 
				'date' => $_POST['date'], 
				'phone' => $_POST['phone'],  
				'message' => $_POST['message'], 
			); 
			$array_data[]=$extra; 
			
			return json_encode($array_data); 
		} 
		else { 
			$datae=array(); 

			$datae[]=array( 
				'patientname' => $_POST['name'], 
				'patientemail' => $_POST['email'], 
				'doctorname' => $_POST['doctor'], 
				'department' => $_POST['department'], 
				'date' => $_POST['date'], 
				'phone' => $_POST['phone'],  
				'message' => $_POST['message'], 
			); 
			
			return json_encode($datae); 
		} 
	} 

$file_name='schedule'. '.json'; 
	
	if(file_put_contents("$file_name", get_data())) { 
		header("Location: index.php");
		}

?>