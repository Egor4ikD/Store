<?php
session_start();
require_once('conlog.php');    
require_once('connect.php');
// Проверка index страницы
if ((basename($_SERVER['SCRIPT_NAME']) == 'index.php')) {
    
    // условия для страницы login.php
    if(isset($_SESSION['user'])) {                        
        echo "<li><a href='logout.php'>Выйти</a></li>";
        
    } else {        
        echo"<li><a href='login.php'>Войти</a></li>";        
        }
    
    if (isset($_SESSION['user']['roleid']) && $_SESSION['user']['roleid'] === $row['roleid']) {
        if ($row['roleid'] !== 2) {
            echo "<li><a href='add.php'>Добавление</a></li>";
        }
    }
}
?>