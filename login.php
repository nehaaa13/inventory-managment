<?php 
include 'config.php';
include 'header.php';
session_start();
if (isset($_SESSION['user_data'])){
  header("location:http://localhost/jkm/admin/index.php");
  $sql = $conn->query("Insert into userlog (username) values ('$username')");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>JKM Login</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="vendor/css/sb-admin-2.css" rel="stylesheet">

    
</head>
<style>
.login-div {
    padding: 30px 80px 30px 80px;
    opacity: 0.9;
    border-radius: 5px;
}

.main {
    background-image: url('jkm.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
</style>

<main class="main col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div>
            <!-- Your login form or content goes here -->
            <div class="login-div" style="background-color: aliceblue;">
                <h3 class="text-center">Login</h3>
                <hr>
                <form method="POST" action="login.php">
                    <!-- Specify the method and action attribute -->
                    <!-- Login form fields -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100" name="login-btn">Login</button>
                    <?php
                        if (isset($_SESSION['error'])){
                            $error=$_SESSION['error'];
                            echo "<p class='ms-1 p-2 text-danger'>".$error."</p>";
                            unset($_SESSION['error']);
                        }

                    ?>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include 'footer.php';
if (isset($_POST['login-btn'])){
    $username =mysqli_real_escape_string($config,$_POST['username']);
    $pass=mysqli_real_escape_string($config,sha1($_POST['password'])); 
    
    $sql="SELECT * FROM USERS WHERE username ='{$username}' and password='$pass'";
    $query=mysqli_query($config, $sql);
    $data=mysqli_num_rows($query);

    if($data == 1){
      $result=mysqli_fetch_assoc($query);
      $user_data=array($result['id'],$result['username'],$result['user_type']);
      $_SESSION['user_data']=$user_data;

    //my code
      $time= "INSERT INTO `user_login_history`(`username`, `login_time`) VALUES('$username', current_timestamp())";
      $result1 = mysqli_query($config, $time);
      $_SESSION['login_history_id'] = mysqli_insert_id($config);
      header("location:admin/index.php");
    }
    else
    {
        $_SESSION['error']="Invalid username or password";
        header("location:login.php");
    }
    }
?>