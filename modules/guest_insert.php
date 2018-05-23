<?php
	include_once 'config.php';

	if(isset($_POST['send'])){
		$name = $_POST["user_name"];
		$text_comment = $_POST["text_comment"];
		
		$name = htmlspecialchars($name);
		$text_comment = htmlspecialchars($text_comment);

		$connect->query("INSERT INTO `comments` (`user_name`,  `text_comment`) VALUES ('$name',  '$text_comment')");
	}

?>