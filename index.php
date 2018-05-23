<?php
    session_start();
?>
<html>
	<head>
		<title>Главная страница</title>
	</head>
    <body>
		<h2>Главная страница</h2>
		<form action="auth/testreg.php" method="post">
		<p><label>Ваш логин:<br></label>
			<input name="login" type="text" size="15" maxlength="15">
		</p>

		<p><label>Ваш пароль:<br></label>
			<input name="password" type="password" size="15" maxlength="15">
		</p>

		<p><input type="submit" name="submit" value="Войти">&nbsp; &nbsp; &nbsp;<input type="submit" name="logout" value="Выйти">
		<br>
		<a href="auth/reg.php">Зарегистрироваться</a> 
		</p></form>
		<br>
		<?php
			if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
				echo "Вы вошли на сайт, как гость<br>Зарегистрируйтесь для доступа к каталогу";
			}
			else	{
				echo "Вы вошли на сайт, как ".$_SESSION['login']."<br><a  href='gallery.php'>В каталог!</a>";
			}
		?>
    </body>
    </html>