<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/style.css"> 
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> <a class="navbar-brand" href="#">Admin Login</a> </div>
  </nav>
  <div class="container login_page">
    <div class="row m-2">
      <div class="col-md-5 border border-secondary m-auto p-4 login_form">
        <?php if(isset($_SESSION['error'])){
          $msg = $_SESSION['error'];
          echo "<p class='bg-danger p-2 text-white text-center'>.$msg.</p>";
          unset($_SESSION['error']);

        }?>
        <h5 class="text-center pb-2">Admin Login</h5>
        <form action="" method="POST">
          <div class="mb-2">
            <label>User ID</label>
            <input type="text" name="user_id" placeholder="User ID" class="form-control" required> </div>
          <div class="mb-2">
            <label>Password</label>
            <input type="password" name="user_pass" placeholder="Password" class="form-control" required> </div>
          <div class="mb-2">
            <button name="login_btn" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
<?php 
$con = mysqli_connect("localhost","root","","session_practice");
if(isset($_POST['login_btn'])){
  $user_id = mysqli_real_escape_string($con,$_POST['user_id']);
  $user_pass = mysqli_real_escape_string($con,$_POST['user_pass']);
  $sql = "SELECT * FROM user_tbl WHERE user_id = '$user_id' AND user_pass = '$user_pass'";
  $query = mysqli_query($con,$sql);
  $row = mysqli_num_rows($query);
  $fetch = mysqli_fetch_array($query);
  echo $row;
  if($row == 1){
    $user_name = $fetch['user_name'];
    session_start();
    $_SESSION['user_name'] = $user_name;
   header("location:dashboard/home.php");
    
  } else {
    
    
  }
  

 /*
  if(rows == 1){
    $record = mysqli_fetch_assoc($query);
    $user_data = array($record['fullName'],$record['user_des']);
    $_SESSION['user_data'] = $user_data;
    $role = $record['user_role'];
    if($role == 0){
      header("location:dashboard/admin_profile.php");
    } else {
      header("location:dashboard/emp_profile.php");
    }
  } else {
    echo "<small>Invalid user ID/Password</small>";
    header("location:index.php");
  }
 */
}


?>