<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php include '../../database/userdbconnect.php' ?>


<?php

	//Get user proficiencies from database
	$prof_title = $prof_description = $prof_url = $prof_time_start = $prof_time_end = $prof_time_combine = "";
	$sql = "
		SELECT 
			title,
			description,
			url,
			time_start,
			time_end
		FROM works
		
		WHERE user_id = '$user_id';
	";

	$res = $conn->query($sql);

	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$prof_title = $row['title'];	
			$prof_description = $row['description'];
			$prof_url = $row['url'];
			$prof_time_start = $row['time_start'];
			$prof_time_end = $row['time_end'];
			
			if(empty($prof_time_end)){
				if(empty($prof_time_start)){
						$prof_time_combine = "";
				} else {
					$prof_time_combine = '<h4>Started: '.$prof_time_start.'</h4>';	
				}
			} else if(!empty($prof_time_start) && !empty($prof_time_end)){
				$prof_time_combine = '<h4>'.$prof_time_start.' - '.$prof_time_end.'</h4>';
			} else {
				$prof_time_combine= '<h4>Complete: '.$prof_time_end.'</h4>';
			}	
			
			echo '<div style="border-bottom: 1px solid black"><h3>'.$prof_title.' <i>'.$prof_time_combine.'</i></h3><p>'.$prof_description.'</p><a href="'.$prof_url.'">'.$prof_url.'</a><br><br></div>';
		}
	} else {
			
	}

$conn->close();
?>