<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
</head>
<body>
</body>
</html>
<?php
    include "Model/DBConfig.php";
    $db = new Database;
    $db->connect();

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }
    else{
        $controller ='';
    }
    switch($controller){
        case 'admin':{
            require_once('Controller/admin/index.php');
        }
    }
?>