<?php
session_start();
include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connect, "SELECT * FROM user WHERE mobile ='$mobile' and password = '$password' and role='$role'");

if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);     // mysqli_fetch_array() is used to fetch data only for singal user...
    $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);     //mysqli_fetch_all() is used to fetch data for all user
     
    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata'] = $groupsdata; 
  
    echo "
    <script>
    window.location = '../Routes/dashboard.php';  
    </script>
    ";
}
else{
    echo "
    <script>
        alert(' Invalid credetials...!  OR user not found');
        window.location = '../HTML/index.html';
    </script>
    ";
}

?> 