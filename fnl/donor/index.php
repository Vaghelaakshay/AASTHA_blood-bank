<?php
require_once "../connenct/database.php";
$obj = new database();
session_start();?>
<?php
if (isset($_POST['submit'])) {
    $msg="";
    $obj->select('donor','d_id,d_name,d_password ');
    $result = $obj->getResult();
    foreach ($result as $user) {
        if ($user['d_name'] == $_POST['user']) {
            if (md5($_POST['pass'])== $user['d_password']){
                $_SESSION['donor'] = $_POST['user'];
                $_SESSION['donor_id'] = $user['d_id'];
                header("location:donor.home.php");
                exit();
            }else {
              $msg="invalid password or username"; 
            }
        }
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="user" name="user" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="pass" required>
            <p style="color:red;" ><?= @$msg ?></p>
            <button type="submit" name="submit">Login</button>
            <p><a href="donor.reset.php">Forgot Password?</a></p>
        <p>you don't have account <a href="donor.registration.php"> Registration</a></p>
        </form>
    </div>
</body>

</html>