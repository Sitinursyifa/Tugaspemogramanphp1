<?php 
session_start();

include 'koneksi.php';

$err        = "";
$username   = "";
$ingataku   = "";

if(isset($_COOKIE['cookie_username'])){
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    $sql1 = "SELECT * FROM login WHERE username = '$cookie_username'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    if($r1['password'] == $cookie_password){
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
        $_SESSION['level'] = $r1['level']; // Simpan level pengguna ke dalam session
    }
}

if(isset($_SESSION['session_username'])){
    header("location: index.php");
    exit();
}

if(isset($_POST['login'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    if($username == '' or $password == ''){
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    } else {
        $sql1 = "SELECT * FROM login WHERE username = '$username'";
        $q1   = mysqli_query($koneksi, $sql1);
        $r1   = mysqli_fetch_array($q1);

        if(empty($r1['username'])){
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        } else if($r1['password'] != md5($password)){
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }       

        if(empty($err)){
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);
            $_SESSION['level'] = $r1['level']; // Simpan level pengguna ke dalam session

            if($ingataku == 1){
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");
            }

            if ($_SESSION['level'] == 1) {
                header("location: index.php");
            } elseif ($_SESSION['level'] == 1) {
                // Level 1 bisa diarahkan ke halaman tertentu jika perlu
                header("location: halaman_level1.php");
            } elseif ($_SESSION['level'] == 2) {
                // Level 2 bisa diarahkan ke halaman tertentu jika perlu
                header("location: index.php");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 1vh;
            background : url('1327980.png') no-repeat;
            background-size: cover;
            background-position: center;
        }

        .container {
            margin-top: 150px;
        }

        .panel {
                    backdrop-filter: blur(10px); /* Adjust the blur intensity as needed */

            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .panel-heading {
            background-color: transparent;
            color: #ffffff;
            font-size: 24px;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .panel-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .input-group-addon {
            background-color: #3498db;
            color: #ffffff;
        }

        .btn-login {
            background-color: #3498db;
            color: #ffffff;
            font-weight: bold;
        }

        .btn-login:hover {
            background-color: #258cd1;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="mainbox mx-auto col-md-6 col-sm-8">
        <div class="panel">
            <div class="panel-heading">Login dan Masuk</div>
            <div class="panel-body">
                <?php if($err) { ?>
                    <div class="alert alert-danger">
                        <?php echo $err; ?>
                    </div>
                <?php } ?>
                <form class="form-horizontal" action="" method="post" role="form">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="<?php echo $username ?>" placeholder="Masukkan username yang benar">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Masukkan password yang benar">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input id="login-remember" type="checkbox" name="ingataku" value="1" <?php if($ingataku == '1') echo "checked"?>> Ingatkan Saya
                            </label>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="login" class="btn btn-login" value="Login"/>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>