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
    <title>Sửa thành viên - Quản lý thành viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>
.capnhatthanhvien{
    
    border: 1px solid #DDDDDD;
    width: 90%;
    margin:60px;
}
.capnhatthanhvien a{
margin-right:5px;
}
.capnhatthanhvien h1{
    padding: 5px;
}
.capnhatthanhvien form table tr td{
    padding: 5px;
}
.capnhatthanhvien form table tr td input{
    padding:3px 5px;
}
.nav{
    width:100%;
}
.nav li {
  display: inline-block;
    padding-right:40%;
}
.nav li a{
    text-align:center;
    float:right;
    padding: 10px 15px 10px 15px; 
    margin-top:25px;
    background:#5dbcd2;
    color:#FFF;
    border-radius:5px;
    border:1px black;
}
</style>
    <div class="content">
        <div class="capnhatthanhvien">   
        <ul class="nav">
            <li><h1>Edit</h1></li>
            <li><a href="index.php?controller=admin&action=list">Back</a>
            <a href="index.php?controller=admin&action=show&id=<?php echo $dataID['id'];?>">Show</a></li>    
        </ul>  
        <hr>
        <form action="" enctype="multipart/form-data" method="POST">
            <table class="table table-striped">
            <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="<?php echo $dataID['title']; ?>" placeholder="Title"></td>                    </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea type="text" name="description" cols=100 rows=10 placeholder="description"><?php echo $dataID['description']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Thumb</td>
                    <td><input type="file"  name="image">
                    <img width="180" height="180" src="<?php echo "uploads/".$dataID['image']; ?>" /></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><select name="status" selected="<?php echo $dataID['status']; ?>" >
                    <option value=0>Enabled</option>                         <option value=1>Disabled</option></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" style="width:80px" name="update_user" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
</div>        
</body>
<html>
