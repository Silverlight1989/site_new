<?php
	include_once 'modules/config.php';
	include_once 'modules/guest_insert.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<title>Гостевая книга</title>
	</head>
	<body>
		<h1>Гостевая книга</h1>
		<?php
			$result_set = $connect->query("SELECT * FROM `comments`");
			while ($row = $result_set->fetch_assoc()) {
		?>
			<div class="comment"><?=$row['user_name']?><br><?=$row['date_creation']?>
			<div class="comment_body"><?=$row['text_comment']?></div></div>
		<?php }?>
		
		<h4>Оставить комментарий:</h4>
		<form method="post" action="" name="comment">
			<p><label>Имя:</label>
				<input type="text" name="user_name"/>
			</p>
			<p><label>Комментарий:</label>
				<br>
				<textarea name="text_comment" cols="75" rows="10"></textarea>
			</p>
			<p><input type="submit" name="send" value="Отправить"/></p>
		</form>
	</body>
</html>