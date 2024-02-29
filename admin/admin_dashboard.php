<?php
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    if(isset($_POST['submit_leave'])){
        $query = "insert into leaves values(null,1,'$_POST[subject]','$_POST[message]')";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
              alert('Form submitted successfully....');
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

    if(isset($_POST['create_task'])){
        $query = "insert into tasks values(null,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
          $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
              alert('Task created successfully....');
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
        <title>User Dashboard</title>
        <!-- jQuery file -->
        <script src="../includes/juqery_latest.js"></script>
        <!-- Bootstrap files -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS file -->
        <link rel="stylesheet" href="../css/style.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/527a10858c.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#create_task").click(function(){
                $("#right_sidebar").load("create_task.php");
                });
            });

            $(document).ready(function(){
                $("#manage_task").click(function(){
                $("#right_sidebar").load("manage_task.php");
                });
            });

            $(document).ready(function(){
                $("#view_leave").click(function(){
                $("#right_sidebar").load("view_leave.php");
                });
            });

        </script>
    </head>
    <body>
        <!-- Header code starts here -->
        <div class="row" id="header">
            <div class="col-md-12">
                <h3><i class=" fa fa-solid fa-list" style="padding-right: 15px;"></i> Task Management System</h3>
            </div>
        </div>
        <!-- Header code ends -->
        <div class="row">
            <div id="left_sidebar" class="col-md-2">
                <table class="table" style="">
                    <tr><td style="text-align: center;"><a type="button" id="create_task">Create Task</a></td></tr>
                    <tr><td style="text-align: center;"><a type="button" id="manage_task">Manage Task</a></td></tr>
                    <tr><td style="text-align: center;"><a type="button" id="view_leave">Leave applications</a></td></tr>
                    <tr><td style="text-align: center;"><a type="button" href="../logout.php" id="logout_link">Logout</a></td></tr>
                </table>
            </div>
            <div id="right_sidebar" class="col-md-10">
                <h4>Instructions for Employees</h4>
                <ul style="line-height: 3em;font-size: 1.2em;list-style-type: none;">
                    <li>1. All the employee should mark their attendance daily.</li>
                    <li>2. Everyone must complete the tasks assigned to them.</li>
                    <li>3. Kindly maintain decorum of the office.</li>
                    <li>4. Keep office and your area neat and clean.</li>
                </ul>
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
