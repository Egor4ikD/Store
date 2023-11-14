 <?php
require_once('connect.php');
 $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sql = "DELETE FROM products WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        header("Location: index.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);     
?>