<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>All4Tell</title>                            
		<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
		<link rel="icon" href="favicon.ico" type = "image/vnd.microsoft.icon">
    </head>
	<body>
			<div id="mainline"> </div>
			<table>	
				<tr>
					<td colspan = 3 id="headline">
						<ul class="nav">
						<li><a href="/web">Главная</a></li>					
						</ul>
					</td>
				</tr>
			</table>
<?php
require_once('connect.php');
require_once('conlog.php');

if(isset($_SESSION['user']['id'])) {
	// Добавление товара в таблицу "заказы"
	$userid = $_SESSION['user']['id']; // Пример значения
	$sql_insert_order = "INSERT INTO orders (userid) VALUES ('$userid')";
	if ($conn->query($sql_insert_order) === TRUE) {
	  $lastOrderId = $conn->insert_id; // Получаем ID последнего добавленного заказа
	} else {
	  echo "Error: " . $sql_insert_order . "<br>" . $conn->error;
	}	
	// Добавление товара в таблицу "заказанные_телефоны"
		$query = "SELECT * FROM carts WHERE userid=" . $_SESSION['user']['id']; 
		$result = mysqli_query($conn, $query);
		
	while ($row = mysqli_fetch_assoc($result)) { 
		$userid = $row['userid']; 
		$productid = $row['productid']; 
		$quantity = $row['quantity']; 
		$totalprice = $quantity * $row['totalprice'];
	
		$sql_insert_ordered_product = "INSERT INTO orderproducts (orderid, productid, quantity, totalprice) VALUES ('$lastOrderId', '$productid', '$quantity', '$totalprice')";			
		if ($conn->query($sql_insert_ordered_product) === TRUE) {
			
		} else {
			echo "Error: " . $sql_insert_ordered_product . "<br>" . $conn->error;
		}
	}
	echo "<div class='orderprod'> <h1>ЗАКАЗ ОФОРМЛЕН</h1></div>";
	$delete_query = "DELETE FROM carts WHERE productid = $productid and userid = $userid"; 
	$conn->query($delete_query); 
	mysqli_free_result($result);
}
$conn->close();
?>
	</body>
</html>
