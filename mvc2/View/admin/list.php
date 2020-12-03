<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa thành viên - Quản lý thành viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
</head>
<body>
<div class="danhsach">
<style>
.danhsach{
    width: 90%;
    margin:60px;
}
.danhsach table,th,tr,td{
    
    border: 1px groove;
    border-collapse:collapse;
}
.danhsach h1{
    float:left;
     
}
.headlink{
    text-align:center;
    float:right;
    padding: 10px 15px 10px 15px; 
    background:#5dbcd2;
    color:#FFF;
    border-radius:5px;
    margin-bottom:10px;
}
.nav li {
  display: inline-block;
    padding-right:40%;
}

</style>
  <ul class="nav">
    <li><h1>Manage</h1></li>
    <li><a class="headlink" href="index.php?controller=admin&action=add">Add</a></li>    
  </ul>  
    <hr>
    <table border="1px" class="table" id="employee_data">
    <col style="width:10%">
	  <col style="width:10%">
	  <col style="width:40%">
    <col style="width:10%">
	  <col style="width:20%;text-align:left;">
        <thead>
            <tr>
                <th class='idcol'>ID</th>
                <th>Thumb</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($data as $value){     
            ?>
            <tr>
                <td class='idcol'><?php echo $value['id']; ?></td>
                <td ><img width="180" height="180" src="<?php echo "uploads/".$value['image']; ?>" /></td>
                <td><?php echo $value['title'];?></td>
                <td><?php if($value['status']==0){
                    echo "Enabled";
                }
                else{
                    echo "Disabled";
                }
                ?></td>
                <td>
                  <a href="index.php?controller=admin&action=show&id=<?php echo $value['id'];?>">Show</a> |
                  <a href="index.php?controller=admin&action=edit&id=<?php echo $value['id'];?>">Edit</a> |
                  <a href="index.php?controller=admin&action=delete&id=<?php echo $value['id'];?>" title = "Xóa">Delete</a>
                
                </td>
            </tr>
            <?php
                }
            ?>     
        </tbody>
    </table>
</div>
</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  