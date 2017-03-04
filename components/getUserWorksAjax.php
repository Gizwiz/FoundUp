<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php include '../../database/userdbconnect.php' ?>

<?php
	
	$user_id = $_POST['user_id'];
	echo $user_id;
	//Get user proficiencies from database
$work_title = $work_description = $work_url = $work_time_start = $work_time_end = $work_time_combine = "";
include '../../database/userdbconnect.php';
$sql = "
		SELECT 
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
			
			echo '<div style="border-bottom: 1px solid black"><h3>'.$work_title.' <i>'.$work_time_combine.'</i></h3><p>'.$work_description.'</p><a href="'.$work_url.'">'.$work_url.'</a><br><br></div>';
		}
	} else {
		echo "<h3>No user projects.</h3>";	
	}
?>