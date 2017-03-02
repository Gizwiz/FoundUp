<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>


<?php include '../../controllers/headApplication.php'; ?>

<body>

<?php include '../../controllers/navApplication.php'; ?>


	<script type="text/javascript">
		function checkBackspace(event, str){
			if(event.keyCode === 8){
				console.log(event);
				suggestMatch(str);	
			}
		}
		
		function suggestMatch(str){

				$(document).ready(function(){
				var searchFname=$("#searchFname").val();
				var searchLname=$("#searchLname").val();
				$.ajax({
					type: "post",
					url: "../../components/getSearchResults.php",
					data: "fname="+searchFname+"&lname="+searchLname,
					success:function(data){
						$("#suggestionResults").html(data);
						/*$("#suggestionResults").find("div").each(function(index){
							$(this).delay(125*index).fadeIn(400);
						});
						*/
					}
				});
				});
			
		
		}
		
	
	</script>
	
	<!-- pills -->
	<div class="container-fluid" style="margin-top: 3%">
	
		<div class="row" id="searchPills">
		
			<div class="col-md-2"></div>
			
			<div class="col-md-8">
				<br>
				<ul class="nav nav-pills nav-justified">
					<li class="active"><a data-toggle="pill" href="#searchForUser">People</a></li>
					<li><a data-toggle="pill" href="#searchForCompany">StartUps</a></li>
				</ul>
				
				<div class="tab-content">
					<div id="searchForUser" class="tab-pane fade in active">
						<br>
						<h1>People</h1>
						<div class="row">
						<div class="col-xs-4">
							First name:<input type="text" id="searchFname" onkeyup="suggestMatch(this.value)" onkeydown="checkBackspace(event, this.value)" >
							Last name:<input type="text" id="searchLname" onkeyup="suggestMatch(this.value)" onkeydown="checkBackspace(event, this.value)" >
						</div>
						<div class="col-xs-4">
							Field: <input type="text" id="searchFname">
							Profession: <input type="text" id="searchFname" >
							
						</div>
						<div class="col-xs-4">
							Country: <input type="text" id="searchFname">
						</div>
						</div>
						<br>
						<div class="row">
							<div class="col-lg-12">
								<div id="suggestionResults" class="pre-scrollable"></div>
							</div>
						</div>
					</div>
					
					<div id="searchForCompany" class="tab-pane fade">
						<h1>StartUps</h1>
					</div>
				
				</div>
				
			
			</div>
			
			<div class="col-md-2"></div>
		
		</div> <!-- end pills row-->
	
	</div> <!-- end pills  -->
	
</body>