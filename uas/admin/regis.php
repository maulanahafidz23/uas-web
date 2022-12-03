<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
require '../koneksi.php';
if (isset($_POST['regis'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];

    if ($password === $cpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "
                <script>
                    alert('Username telah digunakan!');
                    location.href = 'regis.php';
                </script>
            ";
        } else {
            $sql = "INSERT INTO user VALUES (' ', '$username', '$password', '$role')";
            $result = mysqli_query($conn, $sql);
            if (mysqli_affected_rows($conn) > 0) {
                echo "
                    <script>
                        alert('Berhasil Sign in!');
                        location.href = '../login.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Gagal Registrasi!');
                        location.href = 'regis.php';
                    </script>
                ";
            }
        }
    } else {
        echo "
            <script>
                alert('Password anda salah!');
                location.href = 'regis.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="style-login.css?v=<?php echo time(); ?>">
    <!-- Link BoxIcon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/6ed6487098.js" crossorigin="anonymous"></script>  
</head>
<body id="login">
    <form action="" class="login" method="post">
        <div class="gambar-logo">
            <i class='bx bxs-watch'></i>
        </div>
        <div class="logo-login">sign&nbsp<span>in</span></div> 
        <div class="inputfield">
            <label for="">Username</label>
            <input type="text" name="username" id="" class="isi-login" placeholder="  Username" required>
        </div> 
        <div class="inputfield">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="isi-login" placeholder="  Password" required>
        </div>
        <div class="inputfield">
            <label for="">Confirm Password</label>
            <input type="password" name="cpassword" id="" class="isi-login" placeholder="  Password" required>
        </div>
        <div class="roleregis">
            <label for="">Role</label>
            <select class="role" name="role">
                <option value="user">User</option>
            </select>
        </div> 
        <div class="button-login">
            <input type="submit" class="inputlogin" name="regis"  onclick='check()' value="SIGN IN">
        </div>
        <div class="menu-signin">Already have account&nbsp<span><a href="login.php">Log in</a></span></div>
    </form>
</body>
</html>