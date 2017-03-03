<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php include '../../database/userdbconnect.php' ?>

<?php include '../../controllers/headApplication.php' ?>

<body>

	<?php include '../../controllers/navApplication.php'; ?>
	
	<div class="container-fluid">
		
		<div class="row" id="editTop">
			<div class="col-xs-12">
				<br><h1>Edit profile</h1><br>
			</div>
		</div>
		
		<div class="row" id="myInfEdit">
			<div class="col-md-3">
		
				<?php include '../../components/getImage.php' ?>
				<img src="<?=$user_avatar ?>" alt="user_Picture">
				<h3>Change profile picture</h3>
				<form action="../../components/upload.php" method="post" enctype="multipart/form-data">
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
								url: "../../components/fieldsDropdown.php",
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
							$sql = "SELECT field_id, field_name FROM field ORDER BY field_name";
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

				<form action="../../components/saveProfileEdits.php" method="post" class="editSelect">
					<select name="user_profession" id="professionSelect" onchange=this.form.submit()>
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
				
				<ul class="nav nav-pills nav-justified">
					<li><a data-toggle="pill" href="#editContactInformation">Contact Information</a></li>
					<li><a data-toggle="pill" href="#editBasicInformation">Basic Information</a></li>
					<li class="active"><a data-toggle="pill" href="#editWorkInformation">Work and Projects</a></li>
				</ul>
				<div class="tab-content">
				
					<div id="editContactInformation" class="tab-pane fade in" style="height: 50vh">
									
						<form action="../../components/saveProfileEdits.php" method="post" style="text-align:left">
							<h2 style="text-align: center">Contact Information</h2>
							<input type="submit" name="submitNewContactInfo" value="Save info" class="form-control" style="width:35%; display:block;margin:auto;"><br>
							Contact e-mail (does not affect your login e-mail):<input type="email" name="user_email" value="<?php echo $user_email;?>" style="<?php echo $email_css ?>" required><br>
							Phone number:<input type="text" name="user_phonenumber" value="<?php echo $user_phonenumber;?>"><br>
							Address:<input type="text" name="user_address" value="<?php echo $user_address;?>"><br>
							City:<input type="text" name="user_city" value="<?php echo $user_city; ?>"><br>
							Country:<select name="user_country" style="width:100%;"><?php include '../../components/countriesDropdown.php' ?></select><br>
						</form>
					</div>
					
					<div id="editBasicInformation" class="tab-pane fade" style="height: 50vh">
						<form action="../../components/saveProfileEdits.php" method="post" style="text-align:left">
							<h2 style="text-align: center">Basic Information</h2>
							<input type="submit" name="submitNewBasicInformation" value="Save info" class="form-control" style="width:35%; display:block;margin:auto;"><br>
							Date of Birth (DD-MM-YYYY):<input type="date" name="user_dob" value="<?php echo $user_dob;?>"><br>
							Gender:<select name="user_gender" id="gen"><?php include '../../components/gendersDropdown.php' ?></select> 
						
						</form>
					</div>
					
					<div id="editWorkInformation" class="tab-pane fade in active" style="height: 50vh">

						<h2 style="display:inline-block;">Add an entry: &nbsp;</h2>
						
						<!-- Trigger Modal Button -->
						<button type="button" class="btn btn-default btn-circle btn-lg" data-toggle="modal" data-target="#addWorkModal">+</button>
						
						<!-- Modal -->
						<div id="addWorkModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal Content -->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h2 class="modal-title">Add Work Information</h2>
									</div>
									<div class="modal-body">
										<form action="../../components/addUserWorks.php" class="form-group" method="post">
											Title: <input type="text" name="work_title" placeholder="Title of work / Name of project"><br>
											Description (max. 512 characters): <textarea name="work_description" style="width:100%; height: 20%; resize:none;" maxlength="512" placeholder="Description"></textarea><br>
											URL: <input type="text" name="work_url" placeholder="http://www.url.com" ><br>
											Start date (YYYY-MM-DD):
											<input type="text" class="form-control" name="work_start_time" id="datepicker1" placeholder="YYYY-MM-DD">
											<script type="text/javascript">
												$("#datepicker1").datepicker({
													format: "yyyy-mm-dd",
													orientation: "bottom left",
													autoclose: true
												});

											</script>
											End date (YYYY-MM-DD):
											<input type="text" class="form-control" name="work_end_time" id="datepicker2" placeholder="YYYY-MM-DD">
											
											<script type="text/javascript">
												$("#datepicker2").datepicker({
													format: "yyyy-mm-dd",
													orientation: "bottom left",
													autoclose: true
												});

											</script>
											<input class="btn btn-primary btn-lg" type="submit" name="submitWorkInfo" value="Save" style="width:25%">

										</form>
										
										<div class="modal-footer">
											<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
										</div>
									</div>

								</div>
							</div>
						</div><!-- END ADD WORK MODAL -->
						
						
						
						<br><br>
						
						<div style="border-top: 1px solid black" class="pre-scrollable">
							<?php include '../../components/GetWorksWithEditOption.php' ?>
						</div>
						
						
						<!--Edit Work Modal -->
						<div id="editWorkModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal Content -->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h2 class="modal-title">Add Work Information</h2>
									</div>
									<div class="modal-body">
										<form action="../../components/editUserWorks.php" class="form-group" method="post">
											Title: <input type="text" name="work_title" value="<?php echo $work_title ?>" placeholder="Title of work / Name of project"><br>
											Description (max. 512 characters): <textarea name="work_description" style="width:100%; height: 20%; resize:none;" maxlength="512" placeholder="Description"><?php echo $work_description ?></textarea><br>
											URL: <input type="text" name="work_url" value="<?php echo $work_url ?>"placeholder="http://www.url.com" ><br>
											Start date (YYYY-MM-DD):
											<input type="text" class="form-control" name="work_start_time" id="datepicker1" value="<?php echo $work_time_start ?>" placeholder="YYYY-MM-DD">
											<script type="text/javascript">
												$("#datepicker1").datepicker({
													format: "yyyy-mm-dd",
													orientation: "bottom left",
													autoclose: true
												});

											</script>
											End date (YYYY-MM-DD):
											<input type="text" class="form-control" name="work_end_time" id="datepicker2" value="<?php echo $work_time_end ?>"placeholder="YYYY-MM-DD">
											
											<script type="text/javascript">
												$("#datepicker2").datepicker({
													format: "yyyy-mm-dd",
													orientation: "bottom left",
													autoclose: true
												});

											</script>
											<input class="btn btn-primary btn-lg" type="submit" name="submitWorkInfo" value="Save" style="width:25%">

										</form>
										
										<div class="modal-footer">
											<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
										</div>
									</div>

								</div>
							</div>
						</div><!-- END ADD WORK MODAL -->
						

						
						<!-- PLUS BUTTON TO OPEN MODAL TO ENTER WORK INFO -> SUBMIT -->
						<? include getUserWorks.php ?>
						<script>
							function deleteEntry(id){
								$(document).ready(function(){


							}
						
						</script>
					</div>
				</div>
			</div>

				
			</div>

			<div class="col-md-2">

			</div>
		</div>

	
</body>
