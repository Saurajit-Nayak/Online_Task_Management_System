<?php
  session_start();
  if(isset($_SESSION['email'])){
	include('../includes/connection.php');
	$query = "update leaves set status = 'Rejected' where lid = $_GET[id]";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
          alert('Leave status updated successfully...');
        window.location.href = 'admin_dashboard.php';  
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
          alert('Error...Plz try again.');
          window.location.href = 'admin_dashboard.php';
      </script>";
    }
?>
<?php  
}
else{
    header('Location:admin_login.php');
}
?>