<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>All4Tell</title>                            
		<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
		<link rel="icon" href="favicon.ico" type = "image/vnd.microsoft.icon">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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

require_once('connect.php');
 // Нажата ли кнопка
    if (isset($_POST['productid'])) {
        $productid = mysqli_real_escape_string($conn, $_POST['productid']);		
        // Проверяем, есть ли товар уже в корзине
        $check_query = "SELECT * FROM carts WHERE productid = $productid";
        $check_result = mysqli_query($conn, $check_query);

        if (!$check_result) {
            echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
        } else {
            if (mysqli_num_rows($check_result) > 0) {
                // Если товар уже есть в корзине, увеличиваем количество
                $cart_row = mysqli_fetch_assoc($check_result);
                $quantity = $cart_row['quantity'] + 1;
				//Цена товара
				$price_query = "SELECT price FROM products WHERE id = $productid";
				$price_result = mysqli_query($conn, $price_query);
				$price_row = mysqli_fetch_assoc($price_result);
				$price = $price_row['price'];				
				//считаем цену
				$totalprice = $quantity * $price; 
                $update_query = "UPDATE carts SET quantity = $quantity, totalprice = $totalprice WHERE productid = $productid";
                mysqli_query($conn, $update_query);
            } else {
                // Если товара нет в корзине, добавляем его
                $insert_query = "INSERT INTO carts (productid, userid, quantity, totalprice) SELECT id, 20, 1, price FROM products WHERE id = $productid";
                $insert_result = mysqli_query($conn, $insert_query);
				header('Location: index.php');
                if (!$insert_result) {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
                }
            }
        }
		header('Location: index.php');
    }
	  
// Получение списка товаров из корзины
$query = "SELECT c.*, p.name, p.price FROM carts c LEFT JOIN products p ON c.productid = p.id";
$result = mysqli_query($conn, $query);
 
 // Запрос на сумму всей корзины
$total_query = "SELECT SUM(totalprice) as total FROM carts";
$total_result = mysqli_query($conn, $total_query);

if ($total_result) {
  $total_row = mysqli_fetch_assoc($total_result);
  $total = $total_row['total'];
} else {
  echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
}
	
// Проверка наличия записей
if (mysqli_num_rows($result) > 0) {
    // Вывод списка товаров в корзине
	 echo "<section id='tabs' class='project-tab'>
			<table class='table' cellspacing='0'>
				<thead>
					<tr>
						<th>Название</th>
						<th>Количество</th>
						<th>Цена</th>
						<th></th>
					</tr>
				</thead>";
// Получим результат
    while ($row = mysqli_fetch_assoc($result)) {
		echo"<tbody>
				<tr>
					<td>". $row['name'] ."</td>
					<td>". $row['quantity']. " шт.</td>
					<td>". $row['totalprice']." руб.</td>
					<td> <form action='deletecart.php' method='POST'>
							<input type='hidden' name='id' value='" . $row["id"] . "' />		
							<a href='#' class='blubtn'>Удалить</a>
						</form>
						<script src='scripts/script.js'></script>
				</tr>				
			</tbody>";			
    }	
	echo "<tr><td></td> <td style='font-weight: bold;' <td>Общая Сумма:</td>
				<td>" .$total . " руб.</td>
		  </tr>";
	echo"</table>
		</section>";

		echo"<form action='order.php' method='POST'>
				<input type='hidden' name='productid' value='" . $row["id"] . "' />
				<a href='#' class='glo'>Оформить заказ</a>
			</form>
			<script src='scripts/script.js'></script>";
} else { 
	echo"<div class='void'>
	<h1 id ='voidcartup' href='index.php'> <p>Корзина пуста<br></h1>
	 <a id='voidcartdw'<p>перейдите на главную для выбора товара</p></a>
	 </div>";
}
mysqli_close($conn);
?>	
	</body>
</html>