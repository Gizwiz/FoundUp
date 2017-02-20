<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/dbconnect.php' ?>
<?php include '../components/getUserInfo.php' ?>

<?php include '../controllers/headApplication.php' ?>

<body>

	<?php include '../controllers/navApplication.php'; ?>
	
	<div class="container-fluid">
		
		<div class="row" id="editTop">
			<div class="col-xs-12">
				<br><h1>Edit profile</h1><br>
			</div>
		</div>
		
		<div class="row" id="myInfEdit">
			<div class="col-md-3">
		
				<?php include '../components/getImage.php' ?>
				<img src="<?=$user_avatar ?>" alt="user_Picture">
				<h3>Change profile picture</h3>
				<form action="../components/upload.php" method="post" enctype="multipart/form-data">
					<br>
					<input type="file" name="fileToUpload" id ="fileToUpload">
					<input type="submit" value="Upload" name="submitImg">
				</form>
			</div>
			
			<div class="col-md-6">
				<h1>My profession</h1>
				<h3>Currently: <span style="color:dodgerblue"><?php echo $user_profession; ?></span></h3>
				<br>
				<h2>Field:</h2>
				<script type="text/javascript">
					$(document).ready(function(){

						$("#field").change(function(){

							var field=$("#field").val();
							$.ajax({
								type: "post",
								url: "../components/fieldsDropdown.php",
								data:"field="+field,
								success:function(data){
									$("#professionSelect").html(data);	
								}
							});
						});
					});
				</script>
				<form class="editSelect">
					<select name="field" id="field">
						<option>--Select your field--</option>
						<?php 
							$sql = "SELECT field_id, field_name FROM field";
							$res = $conn->query($sql);

							if($res->num_rows>0){
								while($row = $res->fetch_assoc()){
									echo "<option value='".$row['field_id']."'>".$row['field_name']."</option>";
								}
							} else {
								echo "Databse error -- No results found";	
							}
						?>
					</select>
				</form>
				<br>

				<form action="../components/saveProfileEdits.php" method="post" class="editSelect">
					<select name="profession" id="professionSelect" onchange=this.form.submit()>
						<option>--Select your profession--</option>
					</select>
				</form>
			</div>
			
			<div class="col-md-2">
				
			</div>

		</div>
		
		<div class="row" id="aboutEdit">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				
				<ul class="nav nav-pills">
					<li class="active"><a data-toggle="pill" href="#editContactInformation">Contact Information</a></li>
					<li><a data-toggle="pill" href="#editBasicInformation">Basic Information</a></li>
					<li><a data-toggle="pill" href="#editWorkInformation">Work and Projects</a></li>
				</ul>
				<div class="tab-content">
				
					<div id="editContactInformation" class="tab-pane fade in active">
									
						<form action="../components/saveProfileEdits.php" method="post" style="text-align:left">
							<h2 style="text-align: center">Contact Information</h2>
							<input type="submit" name="submitNewInfo" value="Save info" class="form-control" style="width:35%; display:block;margin:auto;"><br>
							Contact e-mail (does not affect your login e-mail):<input type="text" name="user_email" value="<?php echo $user_email;?>" style="<?php echo $email_css ?>" required><br>
							Phone:<input type="text" name="user_phonenumber" value="<?php echo $user_phonenumber;?>"><br>
							Address:<input type="text" name="user_address" value="<?php echo $user_address;?>"><br>
							City:<input type="text" name="user_city" value="<?php echo $user_city; ?>"><br>
							Country:<select name="user_country" style="width:100%;"><?php include '../components/countriesDropdown.php' ?></select><br>
						</form>
					</div>
					
					<div id="editBasicInformation" class="tab-pane fade">
						<h2>AAAAA</h2>
						<br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br><br><br>
					</div>
					
					<div id="editWorkInformation"  class="tab-pane fade">
						<h2>BBBBBB</h2>
						
						<!-- PLUS BUTTON TO OPEN MODAL TO ENTER WORK INFO -> SUBMIT -->
						<br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br><br><br>
					</div>
				</div>

				
			</div>

			<div class="col-md-2">
			
			
			</div>
		</div>
		
		
	</div>
	
</body>
