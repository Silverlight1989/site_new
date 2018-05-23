<html><table>
<?php
for ($i=0; $i<$_SESSION['prod_count']; $i++) {
/* получаем информацию о товаре из базы данных */
$q=”SELECT * FROM products WHERE id=’”.$_SESSION[product_id][$i].”’”;
$query=mysql_query($q);
$prod_in_cart=mysql_fetch_assoc($query);
?>
<tr>
<td><?php echo $prod_in_cart[‘name’]?></td>
<td>
<!-- А дальше идут две формы для изменения количества товара и удаления -->
<form action=”<?php echo $_SERVER[‘REQUEST_URI’]?>” method=”POST”>
количество:<input type=”text” size=”3” value=”<?php echo $_SESSION['product_count'][$i];?> name=”p_count” />
<input type=”hidden” value=”<?php echo $i;?>” name=”upd_id”/>
<input type=”submit” value=”Обновить” /> 
</form>
<form action=”<?php echo $_SERVER[‘REQUEST_URI’]?>” method=”POST”>
<input type=”hidden” value=”<?php echo $i;?>” name=”del_id” />
<input type=”Submit” value=”Удалить” />
</form>
</td>
<td><?php echo $_SESSION['product_price'][$i];?></td>
<td><?php echo $_SESSION['product_price'][$i]* $_SESSION['product_count'][$i];?></td>
</tr>
<?php
}
?>
</table> 
<?php
if (isset($_POST[‘upd_id’])) {
update_cart($_POST[‘p_count’], $_POST[‘upd_id’]);
}
?>
<?php
if (isset($_POST[‘del_id’])) {
remove_from_cart($_POST[‘del_id’]);
}
?>