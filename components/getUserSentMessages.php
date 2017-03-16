<?php

if(!file_exists ('../components/authentication.php')){
	 require 'authentication.php';
}else {
	require '../components/authentication.php';
}
if(!file_exists ('../components/session-check.php')){
	require 'session-check.php';
} else {
	require '../components/session-check.php';
}
if(!file_exists ('../../database/userdbconnect.php')){
	require '../database/userdbconnect.php';
} else {
	require '../../database/userdbconnect.php';
}
   ?>