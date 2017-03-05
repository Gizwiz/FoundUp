<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>


<?php include '../../controllers/headApplication.php'; ?>

<body>

<?php include '../../controllers/navApplication.php'; ?>

<?php 
	//sets the corect searchable pill depending on what the user pressed on the front page
	$userSearchActive = $companySearchActive = "";
	//$_GET will not prompt user to resend on page refresh unlike $_POST
	if(isset($_GET['companySearchButton'])){
		$companySearchActive = "active";
		$userSearchActive = "";
	}else if(isset($_GET['userSearchButton'])){
		$userSearchActive = "active";
		$companySearchActive = "";
	} else {
		$userSearchActive = "active";
		$companySearchActive = "";
	}

?>
	<script type="text/javascript">
		
					$(document).ready(function(){
						console.log("ANIMA");

					var searchFname=$("#searchFname").val();
					var searchLname=$("#searchLname").val();
					var searchField=$("#searchField").val();
					var searchProfession=$("#searchProfession").val();
					var searchCountry=$("#searchCountry").val();
					$.ajax({
						type: "post",
						url: "../../components/getSearchResults.php",
						data: "fname="+searchFname+"&lname="+searchLname+"&field="+searchField+"&profession="+searchProfession+"&country="+searchCountry,
						success:function(data){
							$("#suggestionResults").html(data);
						$(".btn-searchCustom").each(function(index){
							$(this).delay(175*index).fadeIn(600);
							});

						}
					});
				});
		
		function checkBackspace(event){
			if(event.keyCode === 8){
				//$("#searchProfession").val("%");
				suggestMatch();	
			}
		}
		
		function fadeButtonsOut(){
			$(".btn-searchCustom").each(function(){
				$(this).fadeOut(0);
			});
		}
		
		function fadeButtonsIn(){
			$(".btn-searchCustom").each(function(index){
				$(this).delay(175*index).fadeIn(1000);
			});

		}
		function suggestMatch(){

				$(document).ready(function(){
					var searchFname=$("#searchFname").val();
					var searchLname=$("#searchLname").val();
					var searchField=$("#searchField").val();
					var searchProfession=$("#searchProfession").val();
					var searchCountry=$("#searchCountry").val();
					var count = 0;
					$.ajax({
						type: "post",
						url: "../../components/getSearchResults.php",
						data: "fname="+searchFname+"&lname="+searchLname+"&field="+searchField+"&profession="+searchProfession+"&country="+searchCountry,
						success:function(data){
							$("#suggestionResults").html(data);
							fadeButtonsIn();
						}
					});
				});

		}
		
	
	</script>
	
	<!-- pills -->
	<div class="container" style="margin-top: 3%">

		<div class="row" id="searchPills">

			<div class="col-md-12">
				<br>
				<ul class="nav nav-pills nav-justified dark">
					<li class="<?php echo $userSearchActive ?>"><a data-toggle="pill" href="#searchForUser">People</a></li>
					<li class="<?php echo $companySearchActive ?>"><a data-toggle="pill" href="#searchForCompany">StartUps</a></li>
				</ul>

				<div class="tab-content">
					<!-- USER SEARCH PILL -->
					<div id="searchForUser" class="tab-pane fade in <?php echo $userSearchActive ?>">
						<br>
						<div class="row">
						<div class="col-xs-4">
							First name:<input type="text" id="searchFname" onkeyup="suggestMatch()" onkeydown="checkBackspace(event)" >
							Last name:<input type="text" id="searchLname" onkeyup="suggestMatch()" onkeydown="checkBackspace(event)" >
						</div>
						<div class="col-xs-4">
							Field:

							<!-- ajax to get prefessions based on selected field -->
							<script type="text/javascript">
								$(document).ready(function(){
									$("#searchField").change(function(){
										var field=$("#searchField").val();
										$.ajax({
											type: "post",
											url: "../../components/fieldsDropdown.php",
											data:"field="+field,
											success:function(data){
												$("#searchProfession").html(data);
											}
										});
									});
								});
							</script>

							<form>
								<select name="searchField" id="searchField" onchange="suggestMatch()">
									<option>--Select professional field--</option>
									<?php 
										include '../../database/userdbconnect.php';
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
							Profession:

							<select name="user_profession" id="searchProfession" onchange="suggestMatch()">
								<option>--Select your profession--</option>
							</select>

						</div>
						<div class="col-xs-4">
							Country: <select name="user_country" id="searchCountry" style="width:100%;" onchange="suggestMatch()"><?php include '../../components/countriesDropdown.php' ?></select>
						</div>

						</div>
						<br>
						<div class="row">
							<div class="col-lg-12">
								<div id="suggestionResults" class="pre-scrollable">
								
								</div>
							</div>
						</div>
					</div> <!-- END USER SEARCH PILL -->

					<!-- COMPANY SEARCH PILL -->
					<div id="searchForCompany" class="tab-pane fade in <?php echo $companySearchActive ?>">
					</div>
					<!-- END COMPANY SEARCH PILL -->

				</div>


			</div>


		</div> <!-- end pills row-->

	</div> <!-- end pills  -->
	<script>
		function getPreviewProfile(id){
			$.ajax({
				type: "post",
				url: "../../components/getSearchedUserProfilePreview.php",
				data:"id="+id,
				success:function(data){
					$("#profilePreview").html(data);
				}
			});
		}
			
			
	
	</script>
	
	<!-- MODAL:  preview user profile with button to go view full profile -->
	<div id="previewUserProfile" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal Content -->
			<div class="modal-content" id="profilePreview">
				<!-- Modal Content generated back-end-->
			</div>
		</div>
	</div>
	

	
</body>