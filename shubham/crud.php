<?php
$servername="localhost";;
$username="root";
$password="";
$database="shubham";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Failed to connect".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $sql="insert into `data`(`txt1`,txt2)values('$title','$description')";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "Record added successfully";
    }
    else{
        echo "Error while adding"; 
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
<form action="" method="post">
  <div class="mb-3">
    <label for="title" class="form-label">Note title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="mb-3">
  <label for="description" class="form-label">Note description</label>
  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
</div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>
    </div>
    <div class="container">
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sr no</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $i=1;
         $sqlz = "select * from data";
         $result = mysqli_query($conn,$sqlz);
         while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
               <th scope="row"><?php echo $i?></th>
               <td><?php echo $row['txt1']?></td>
               <td><?php echo $row['txt2']?></td>
               <td><a href="edit.php?id=<?php echo $row['sr']?>">Edit</a>   <a href="delete.php?id=<?php echo $row['sr']?>" onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>
            </tr>
            
            <?php
            $i++;
         }
         ?>
  </tbody>
</table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></scrip>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    
    <script>
       $(document).ready( function () {
           $('#myTable').DataTable();
          } );
    </script>
  </body>
</html>