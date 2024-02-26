<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('includes/connection.php');
    if(isset($_POST['update'])){
        $query = "update tasks set status = '$_POST[status]' where tid = $_GET[id]";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
              alert('Status updated successfully...');
            window.location.href = 'user_dashboard.php';  
          </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'user_dashboard.php';
          </script>";
        }
    }
?>
<html>
<head>
    <title>ETMS</title>
    <!-- jQuery file -->
    <script src="includes/juqery_latest.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="home_page" style="display:flex; flex-direction:column;align-items:center; height:37vh; width:50vw;">
            <center>
                <h3 style="width:20vw">Update task status</h3>
                <?php 
                    $query = "select * from tasks where tid = $_GET[id]";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" />
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="status">
                                <option>-Select-</option>
                                <option>Complete</option>
                                <option>In-Progress</option>
                            </select>
                            </div>
                            <button type="submit" class="btn btn-danger" name="update">Update</button>
                            <a href="user_dashboard.php" class="btn btn-primary">Dashboard</a>
                        </form>
                        <?php
                    }
                 ?>
            </center>
        </div>
    </div>
</body>
</html> 
<?php  
}
else{
    header('Location:user_login.php');
}
