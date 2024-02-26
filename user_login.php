<?php 
    session_start();
    include('includes/connection.php');   
    if(isset($_POST['userlogin'])){
        $query = "select email,password,name,uid from users where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run)){
            $_SESSION['email'] = $_POST['email'];
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['name'] = $row['name'];
                $_SESSION['uid'] = $row['uid'];
            }
            echo "<script type='text/javascript'>
              window.location.href = 'user_dashboard.php';
            </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Please enter correct email and password.');
              window.location.href = 'user_login.php';
          </script>";
        }
    }
?>
<html>
<head>
    <title>User Login</title>
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
        <div class="col-md-4 m-auto text-center" id="login_home_page" style="display: flex; flex-direction:column;align-items:center">
            <h3 style="background-color: #5A8F7B; padding: 10px; width: 15vw; margin-bottom:2px auto; ">User login</h3>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" name="userlogin" value="Login">
                </div>
            </form>
            <a href="index.php" class="btn btn-danger" style="position:absolute; bottom:7px">Go to Home</a>
        </div>
    </div>
</body>
</html>
