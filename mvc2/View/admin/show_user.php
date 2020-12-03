<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm thành viên - Quản lý thành viên</title>
</head>
<body>
    <div class="content">
    <style>
    .nav li {
        display: inline-block;
        padding-right:40%;
    }
    .nav a{
    text-align:center;
    float:right;
    padding: 10px 15px 10px 15px; 
    background:#5dbcd2;
    color:#FFF;
    border-radius:5px;
    
    }
    </style>
        <div class="showuser">   
            <ul class="nav">
            <li><h1><?php echo $dataID['title']; ?></h1></li>
            <li><a href="index.php?controller=admin&action=list">Back</a></li>
            </ul>
            <hr>
                <table>
                    <tr>
                        <td><img width="200" height="200" src="<?php echo "uploads/".$dataID['image']; ?>" /></td>
                        <td><textarea cols=120 rows=13><?php echo $dataID['description']; ?></textarea></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>        
</body>
<html>