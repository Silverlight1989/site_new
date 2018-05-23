<?php
	include_once 'modules/config.php';

	function translit($string){
		$translit = array(
			'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'ye',
			'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k',
			'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
			'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts',
			'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
			'э' => 'e', 'ю' => 'yu', 'я' => 'ya');
		return str_replace(' ','_', strtr(mb_strtolower(trim($string)),$translit));
	}

	function changeImage($h, $w, $src, $newsrc, $type){
		$newimg = imagecreatetruecolor($w, $h);
		switch ($type){
		case 'jpeg':	
			$img = imagecreatefromjpeg($src);
			imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
			imagejpeg($newimg, $newsrc);
		break;
		case 'png':	$img = imagecreatefrompng($src);
			imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
			imagepng($newimg, $newsrc);
		break;
		case 'gif':	$img = imagecreatefromgif($src);
			imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
			imagegif($newimg, $newsrc);
		break;
		}
	}

	$message = '';
	$path_small='';
	$path_orig='';

	if(isset($_POST['send'])){
		
		if($_FILES['userfile']['error']){
			$message = 'Ошибка загрузки файла!';
		} elseif($_FILES['userfile']['size']>10000000){
			$message = 'Файл слишком большой';
		} elseif(	$_FILES['userfile']['type']=='image/jpeg'||
					$_FILES['userfile']['type']=='image/png' ||
					$_FILES['userfile']['type']=='image/gif'){

			$path_orig = PHOTO.translit($_FILES['userfile']['name']);
			if (copy($_FILES['userfile']['tmp_name'], $path_orig)){
				$path_small = PHOTO_SMALL.translit($_FILES['userfile']['name']);
				$type = explode('/', $_FILES['userfile']['type'])[1];
				changeImage(150, 150, $_FILES['userfile']['tmp_name'], $path_small, $type);
				$message = 'Success!!!';
			
			} else {$message= 'Ошибка загрузки файла!';}
		} else {$message = 'Неправильный тип файла!';}
		
		$title = htmlspecialchars($_POST['item_name']);
		$price = htmlspecialchars($_POST['item_price']);
		$info = htmlspecialchars($_POST['item_info']);
		
		$sql_insert="INSERT INTO goods (`title`, `price`, `mini_img`, `original_img`, `info`) VALUES ('".$title."', '".$price."', '".$path_small."', '".$path_orig."', '".$info."')";
		$result_insert=mysqli_query($connect, $sql_insert);
	}
?>