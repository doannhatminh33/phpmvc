<?php 
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"uploads/".$file_name);
       echo "Success";
    }else{
       print_r($errors);
    }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm thành viên - Quản lý thành viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="content">
    <style>
    .dangkythanhvien{
    width:400px;
    border: 1px solid #DDDDDD;
    margin-top: 60px;
    margin:0px auto;
}
.dangkythanhvien h3{
    padding: 5px;
}
.dangkythanhvien form table tr td{
    padding: 5px;
}
.dangkythanhvien form table tr td input{
    padding:3px 5px;
}
</style>
        <div class="dangkythanhvien">
            <a href="index.php?controller=admin&action=list" class="list">Back</a>    
            <h3>Thêm mới thành viên</h3>
            <form action="" enctype="multipart/form-data" method="POST">
                <table>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" placeholder="Title"></td>
                    </tr>
                      <tr>
                        <td>Description</td>
                        <td><input type="text" name="description" placeholder="description"></td>
                    </tr>
                    <tr>
                        <td>Thumb</td>
                        
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><select name="status" >
                        <option value=0>Enabled</option>
                         <option value=1>Disabled</option>
                         </select></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="add_user" value="Thêm mới"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>        
</body>
<html>