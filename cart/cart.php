<!DOCTYPE= "html5">
<body>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
<label>
<input type="hidden" name="product_price" value= "<?php echo $p['price']?>" />
<input type="hidden" name="product_id" value= "<?php echo $p['pid']?>" />
<input type="hidden" name="tocart" value= "tocart" />
<input type="submit" name="submit" value= "В корзину" />
</label>
</form>
</body>
</html>
<?
function addtocart($product_id, $product_price) {
$_SESSION['prod_count']++;
$incart=$_SESSION['prod_count'] - 1;
$_SESSION['product_id'][$incart] = $product_id;
$_SESSION['product_price'][$incart] = $product_price;
$_SESSION['product_count'][$incart] = 1;
}
$_SESSION['prod_count'] = 1
$_SESSION['product_id'][0]=3
$_SESSION['product_price'][0]=160
$_SESSION['product_count'][0] = 1;
$_SESSION['product_count'][$incart] = 1
$_SESSION['prod_count'] = 2
$_SESSION['product_id'][1]=1
$_SESSION['product_price'][1]=100
$_SESSION['product_count'][1] = 1;?>
<?function update_cart($cnt, $update_key) { 
$_SESSION['product_count'][$update_key]=$cnt; 
update_cart_sum(); 
}?>