<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>All4Tell</title>                            
		<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
		<link rel="icon" href="favicon.ico" type = "image/vnd.microsoft.icon">
    </head>
	<body>
		<!--
		<div id="maintable">-->
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
session_start();
require_once('connect.php');
$cart_query = "SELECT * FROM carts WHERE productid = $productid";
$cart_result = $conn->query($cart_query);

// Перемещение товаров из корзины в заказ
while ($row = $cart_result->fetch_assoc()) {
    $productid = $row['productid'];
    $quantity = $row['quantity'];
    $totalprice = 'quantity * price'; // Здесь необходимо вычислить общую сумму заказа на основе цен товаров

    $insert_query = "INSERT INTO orders (userid, productid, quantity, totalprice) VALUES ($userid, $productid, $quantity, $totalprice)";
    $conn->query($insert_query);
}

// Очистка корзины после создания заказа
$delete_query = "DELETE FROM cart WHERE productid = $productid";
$conn->query($delete_query);

// Закрытие соединения с базой данных
$conn->close();
?>
	</body>
</html>

