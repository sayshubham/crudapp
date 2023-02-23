<?php
include('config.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
$txt1=$_POST['title'];
$txt2=$_POST['description'];
$id=$_GET['id'];
$sqlz="update data set txt1='$txt1',txt2='$txt2' where sr='$id'";
$result=mysqli_query($conn,$sqlz);
if($result){
    header("Location:crud.php");
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <title>crud ops</title>
  </head>
  <body>
<div class="container my-3">
    <?php
     $id=$_GET['id'];
     $sql="select * from data where sr='$id'";
     $result=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result)){
        ?>
        <form action="" method="post">
          <div class="mb-3">
            <label for="title" class="form-label">Note title</label>
            <input type="text" class="form-control" id="title<?php echo $id?>" name="title" value=<?php echo $row['txt1'];?>>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Note description</label>
            <textarea class="form-control" id="description<?php echo $id?>" name="description" rows="3"><?php echo 
            $row['txt2'];?></textarea>
          </div>
             <button type="submit" class="btn btn-primary">Add</button>
          </form>
    </div>
        <?php
     }
    ?>
     </body>
</html>
