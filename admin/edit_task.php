<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    if(isset($_POST['edit_task'])){
        $query = "update tasks set uid = $_POST[id],description = '$_POST[description]',start_date = '$_POST[start_date]',end_date = '$_POST[end_date]' where tid = $_GET[id]";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
              alert('Task updated successfully...');
            window.location.href = 'admin_dashboard.php';  
          </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'admin_dashboard.php';
          </script>";
        }
    }
?>
<html>
<head>
    <title>ETMS</title>
    <!-- jQuery file -->
    <script src="../includes/juqery_latest.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header code starts here -->
        <div class="row" id="header">
            <div class="col-md-12">
                <h3><i class=" fa fa-solid fa-list" style="padding-right: 15px;"></i> Task Management System</h3>
            </div>
        </div>
    <div class="row">
        <div class="col-md-4 m-auto" style="color:white;"><br>
            <h3 style="color: white;">Edit the task</h3><br>
            <?php 
                $query1 = "select * from tasks where tid = $_GET[id]";
                $query_run1 = mysqli_query($connection,$query1);
                while($row1 = mysqli_fetch_assoc($query_run1)){
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $row1['tid']; ?>" required/>
                        </div>
                        <div class="form-group">
                        <label>Select user:</label>
                        <select name="id" class="form-control" required>
                            <option>-Select-</option>
                            <?php  
                                $query = "select uid,name from users";
                                $query_run = mysqli_query($connection,$query);
                                if(mysqli_num_rows($query_run)){
                                    while($row = mysqli_fetch_assoc($query_run)){
                                        ?>
                                        <option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea class="form-control" rows="3" cols="50" name="description" placeholder="Mention the task" required><?php echo $row1['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Start date:</label>
                        <input type="date" class="form-control" name="start_date" value="<?php echo $row1['start_date']; ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>End date:</label>
                        <input type="date" class="form-control" name="end_date" value="<?php echo $row1['end_date']; ?>" required/>
                    </div>
                    <input type="submit" class="btn btn-warning" name="edit_task" value="Update" required />
                    </form>
                    <?php
                }
             ?>
        </div>
    </div>
</body>
</html> 
<?php  
}
else{
    header('Location:admin_login.php');
}
?>