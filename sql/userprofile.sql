CREATE TABLE IF NOT EXISTS 'user' (

	'user_id' int(11) NOT NULL AUTO_INCREMENT,
	'user_email', varchar(255) NOT NULL,
	'user_password' varchar(255) NOT NULL,
	'user_firstname' varchar(64) NOT NULL,
	'user_lastname' varchar(64) NOT NULL,
	'user_avatar' varchar(255) NOT NULL,
	'user_bio' text,
	'user_dob' date DEFAULT NULL,
	'user_profession' text,
	'user_gender' varchar(32),
	'user_maritalstatus' varchar(32),
	'user_address' text,
	'user_joindata' date NOT NULL,
	'user_country' varchar(255) NOT NULL;
	
	PRIMARY KEY ('user_id')
	UNIQUE KEY 'user_email' ('user_email'),

) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;