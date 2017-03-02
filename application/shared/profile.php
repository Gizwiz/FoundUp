<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>

<?php 
	
	
	$user = htmlspecialchars($_GET["user"]);
	echo $user;

?>