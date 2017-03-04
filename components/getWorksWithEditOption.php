 <?php
if(!file_exists('../../components/authentication.php')){
require '../components/authentication.php';
} else {
require '../../components/authentication.php';
}
if(!file_exists( '../../components/session-check.php')){
require '../components/session-check.php';
} else {
require '../../components/session-check.php';
} 
if(!file_exists('../../components/getUserInfo.php')){
include '../components/getUserInfo.php';
} else {
include '../../components/getUserInfo.php';
}
?>

<?php

	//Get user proficiencies from database
	$work_title = $work_description = $work_url = $work_time_start = $work_time_end = $work_time_combine = "";
if(!file_exists('../../database/userdbconnect.php')){
require '../database/userdbconnect.php';
} else {
require '../../database/userdbconnect.php';
}
$sql = "
		SELECT 
			id,
			work_title,
			work_description,
			work_url,
			work_time_start,
			work_time_end
		FROM works
		
		WHERE user_id = '$user_id';
	";

	$res = $conn->query($sql);

	if($res->num_rows>0){
			
		while($row=$res->fetch_assoc()){
			$id = $row['id'];
			$work_title = $row['work_title'];	
			$work_description = $row['work_description'];
			$work_url = $row['work_url'];
			$work_time_start = $row['work_time_start'];
			$work_time_end = $row['work_time_end'];
			
			if(empty($work_time_end)){
				if(empty($work_time_start)){
						$work_time_combine = "";
				} else {
					$work_time_combine = '<h4>Started: '.$work_time_start.'</h4>';	
				}
			} else if(!empty($work_time_start) && !empty($work_time_end)){
				$work_time_combine = '<h4>'.$work_time_start.' - '.$work_time_end.'</h4>';
			} else {
				$work_time_combine= '<h4>Complete: '.$work_time_end.'</h4>';
			}	
			
			echo '<div style="border-top: 1px solid black">
			<br>
			<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#editWorkModal">EDIT</button>
			&nbsp;&nbsp;&nbsp;

			<button id='.$id.'" type="button" onclick="setId('.$id.')" class="btn btn-default btn-lg" data-toggle="modal" data-target="#confirmWorkDeletionModal">DELETE</button>

			<h3>'.$work_title.'<i>'.$work_time_combine.'</i></h3><p>'.$work_description.'</p><a href="'.$work_url.'">'.$work_url.'</a><br><br></div>';
			
		}
	} else {
		echo '<div><br><h3>No projects.</h3></div>';	
	}

$conn->close();
?>