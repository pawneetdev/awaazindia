<?php

	if(!@mysql_connect('localhost', 'root', '123456') || !@mysql_select_db('ttfoi'))
	die(mysql_error());

?>