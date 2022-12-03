<?php
session_set_cookie_params(0);
session_start();
require 'koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            if($row['role']=='admin'){
                $_SESSION['login'] = true;
                header("Location: admin/index.php");
                exit;
            } else if($row['role']=='user'){
                $_SESSION['login'] = true;
                header("Location: index.php?username=$username");
                exit;
            }
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/6ed6487098.js" crossorigin="anonymous"></script>  
</head>
<body id="login">
    <form action="" class="login" method="post">
        <div class="gambar-logo">
            <i class='bx bxs-car'></i>
        </div>
        <div class="logo-login">LOG<span>IN</span></div>
        <div class="error-login">
            <?php
            if (isset($error)) {
                echo "<p>Username atau password salah!</p>";
            }
            ?>
        </div>  
        <div class="inputfield">
            <label for="">Username</label>
            <input type="text" name="username" class="isi-login" placeholder="  Username" required>
        </div> 
        <div class="inputfield">
            <label for="">Password</label>
            <input type="password" name="password" class="isi-login" placeholder="  Password" required>
        </div>
        <div class="button-login">
            <input type="submit" class="inputlogin" name="login"  onclick='check()' value="LOGIN">
        </div>
        <div class="menu-signin">Don't have an account?&nbsp<span><a href="regis.php">Sign in</a></span></div>
    </form>
</body>
</html>