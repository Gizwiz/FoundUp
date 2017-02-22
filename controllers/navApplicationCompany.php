

<nav class="navbar navbar-default navbar-custom navbar-fixed-top" role="navigation"> 
         <div class="container-fluid"> 
             <!-- Brand and toggle get grouped for better mobile display --> 
             <div class="navbar-header"> 
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navLinks"> 
                     <span class="sr-only">Toggle navigation</span> 
                     <span class="icon-bar"></span> 
                     <span class="icon-bar"></span> 
                     <span class="icon-bar"></span> 
                 </button> 
                 <a class="navbar-brand logo" href="companyFrontpage.php?user=<?php echo $_SESSION['company_username']; ?>">
					FoundUp
				 </a> 
             </div> 
             <!-- Collect the nav links, forms, and other content for toggling --> 
             <div class="collapse navbar-collapse" id="navLinks"> 
                 <ul class="nav navbar-nav navbar-right"> 
					 <li>
						<a href="companyFrontpage.php?user=<?php echo $_SESSION['company_username']; ?>">Front Page</a>
					 </li>
					 <li>
						<a href="companyProfile.php?user=<?php echo $_SESSION['company_username']; ?>">Company Profile</a>
					 </li>
					 <li>
					 	<a href="companyContacts.php?user=<?php echo $_SESSION['company_username']; ?>">Contacts</a>
					 </li>
                     <li> 
                         <a href="companyInbox.php?user=<?php echo $_SESSION['company_username']; ?>">Messages</a> 
                     </li>
					 <li>
					 	<a href="companySettings.php?user=<?php echo $_SESSION['company_username']; ?>">Settings</a>
					 </li>
                     <li> 
                         <a href="../../components/logout.php">Log out</a> 
                     </li> 
					 <li>
						<div class="input-group stylish-input-group" id="searchNavBar" style="width:10em; margin-top: 5%;">
							<input type="text" class="form-control"  placeholder="Search" id="searchBar" onkeydown="checkForEnterKey(event)" >
							<div class="input-group-addon" onclick="searchForEnteredData()" >
								<button type="submit">
									<span class="glyphicon glyphicon-search" style="color:black; background-color:#white"></span>
								</button>  
							</div>
						</div>
					 </li>
                     
                 </ul> 
            </div> 
             <!-- /.navbar-collapse --> 
         </div> 
         <!-- /.container --> 
</nav> 
