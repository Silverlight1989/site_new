<?php
	include_once 'modules/config.php';
	include_once 'modules/photo1.php';

	$sql= "select * from goods";
	$res = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Магазин духов</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
	<h1>Каталог товаров</h1>
	</header>

	<div class="goods"><table><tr><td>

			<?php 
				$td_count=0;
				$tabl = "<table><tr>";
				$row1 = "";
				$row2 = "";
				$row3 = "";
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
				} 
				$tabl = $tabl.$row1."</tr>".$row2."</tr>".$row3."</tr></table>"; 
				echo $tabl;
				?>
</td></tr></table>	</div>
<hr>
	<div class="add_foto">
	<form action="" method="POST" enctype="multipart/form-data">
	<table>
	<tr><td><span><b>Добавить файл: </b></span><input type="file" name="userfile"></td>
		<td align="right"><b>Название: </b></td>
		<td><input type="text" name="item_name" required/></td></tr>
	<tr><td><button type="submit" name="send">ЗАГРУЗИТЬ </button></td>
		<td align="right"><b>Цена: </b></td><td><input type="number" name="item_price"/></td></tr>
	<tr><td></td><td align="right"><b>Описание: </b></td><td><input type="textarea" name ="item_info"/></td></tr>
	</table>
		<span><?=$message?></span>
	</form>
	</div>
<br>

</body>
</html>