<?php include '../../database/companydbconnect.php' ?>

<?php
	$count = 0;
	$suggestedCompany = array();
	$suggestedCompanyAvatar = array();
	$suggestedCompanyAboutShort = array();
	//This is VERY SLOW for large tables. Has to go through entire table.
	$sql = "
		SELECT company_name, company_avatar FROM company ORDER BY RAND() LIMIT 12
	";

	$res=$conn->query($sql);

	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$suggestedCompany[$count] = $row['company_name'];
			$suggestedCompanyAvatar[$count] = $row['company_avatar'];
			$count++;
		}
	}

	while(count($suggestedCompany)<12){
		array_push($suggestedCompany, "N/A");
		array_push($suggestedCompanyAvatar, "../../resources/companyAvatars/startup.jpg");
	}

?>

<div class="container-fluid">
		<div class="row">
			<h2 style="text-align:center">You may be interested in:</h2><br>
			<div class="col-xs-12">
			<div class="carousel slide" data-ride="carousel" id="suggestionsCarousel" data-interval="8000">
				<div class="carousel-inner">

					<div class="item active">
						<ul class="thumbnails">
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[0] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[0] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[1] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[1] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[2] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[2] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[3] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[3] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
						</ul>
					</div><!--first slide-->
					
					<div class="item" >
						<ul class="thumbnails">
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[4] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[4] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[5] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[5] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[6] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[6] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[7] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[7] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
						</ul>
					</div> <!-- second slide -->
					
					
					<div class="item">
						<ul class="thumbnails">
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[8] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[8] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[9] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[9] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[10] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[10] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
							<li class="col-sm-3">
								<div class="fff">
									<div class="thumbnail">
										<a href="#"><img src="<?php echo $suggestedCompanyAvatar[11] ?>" alt=""></a>
									</div>
									<div class="caption">
										<h4><?php echo $suggestedCompany[11] ?></h4>
										<p>INFO HERE</p>
										<a class="btn btn-default" href="#">>> View</a>
									</div>
								</div>
							</li>
						</ul>
					</div> <!-- third slide -->
				</div>
	   <nav>
			<ul class="control-box pager">
				<li><a data-slide="prev" href="#suggestionsCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
				<li><a data-slide="next" href="#suggestionsCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></a></li>
			</ul>
		</nav>	
			</div> 
			</div><!-- col-xs-12 -->
		</div><!-- row -->
</div>
<!-- container -->