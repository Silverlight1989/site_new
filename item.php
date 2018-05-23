<?php
	include_once 'modules/config.php';

	$sql= "select * from goods";
	$res = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Работа с файлами</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<a href="gallery.php">Вернуться в каталог</a>
		<div class="goods">			<?php 
				$td_count=0;
				$tabl = "<table><tr>";
				$row1 = "";
				$row2 = "";
				$row3 = "";
				$card = "Sorry, wrong item.";
				while($data = mysqli_fetch_assoc($res)) { 
					$row1 = $row1."<td class=\"block1\">";
					$row2 = $row2."<td class=\"block2\">";
					$row3 = $row3."<td class=\"block3\">";
					$td_count+=1;
					$row1 = $row1.$data['title']."<br></td>";
					$row2 = $row2."<a href=\"item.php?id=".$data['id']."\">";
					$row2 = $row2."<img src=\"".$data['mini_img']."\"></a><br></td>";
					$row3 = $row3.$data['price']."р.</td>";
					if ($td_count==6)	{
						$td_count = 0; $tabl = $tabl.$row1."</tr><tr>".$row2."</tr><tr>".$row3."</tr><tr class=\"block1\">";
						$row1 = "";
						$row2 = "";
						$row3 = "";
					} 
						
					if($data["id"] == $_GET['id'])	{
						$card = "";
						$card = $card."<table><tr><td><img src=\"".$data['original_img']."\"width=\"500\" height=\"500\">";
						$card = $card."</td><td valign=\"top\"><div class=\"descr\"><h1>".$data['title']."</h1>".$data['info'];
						$card = $card."<br><br><b>Цена: </b>".$data['price'];
						$card = $card."&nbsp;<button type=\"submit\" name=\"add\">Добавить в корзину</button>";
						$card = $card."</div></td></tr></table>";
					}
				} 
				$tabl = $tabl.$row1."</tr>".$row2."</tr>".$row3."</tr></table>"; 
				echo $tabl;
				echo "<br>";
				echo $card;?>
			
		</div>
</body>
<html>