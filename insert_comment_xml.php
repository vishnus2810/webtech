<?php


$patientname=$_POST['name'];
$patientemail=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

//insert into xml document
appendPatient("patientname",$patientname);
appendPatient("patientemail",$patientemail);
appendPatient("subject",$subject);
appendPatient("message",$message);



function appendPatient($tag,$data){
	$xdoc = new DomDocument;
	$xdoc->Load('comment.xml');
	$comment = $xdoc->getElementsByTagName('comment')->item(0);
	$newElement = $xdoc ->createElement($tag);
	$txtNode = $xdoc ->createTextNode ($data);
	$newElement -> appendChild($txtNode);
	$comment -> appendChild($newElement);
	$test = $xdoc->save("comment.xml");
}

	function get_data() { 
		
		$file_name='comments'. '.json'; 

		if(file_exists("$file_name")) { 
			$current_data=file_get_contents("$file_name"); 
			$array_data=json_decode($current_data, true); 
							
			$extra=array( 
				'patientname' => $_POST['name'], 
				'patientemail' => $_POST['email'], 
				'subject' => $_POST['subject'],  
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
				'subject' => $_POST['subject'],  
				'message' => $_POST['message'],  
			); 
			
			return json_encode($datae); 
		} 
	} 

$file_name='comments'. '.json'; 
	
	if(file_put_contents("$file_name", get_data())) { 
		header("Location: index.php");
		}

?>