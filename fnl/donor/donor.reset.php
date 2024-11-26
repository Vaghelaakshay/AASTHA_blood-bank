<?php require_once "../connenct/database.php";
$obj = new database(); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $dob = $_POST['resetDOB'];
    $phone = $_POST['resetPhone'];
    $newPassword = $_POST['newpass'];
    $confirmPassword = $_POST['conpass'];
    $where = "d_dob = '$dob' AND d_phone = '$phone'";
    $query ='SELECT * FROM `donor` WHERE '.$where;
    $obj->sql($query);
    $values = $obj->getResult();
    // echo "<pre>";
    // var_dump($values);
    // echo "</pre>";
    if (!empty($values) && is_array($values)) {

        if ($newPassword == $confirmPassword) {
            $hashPass = md5($newPassword);
            $where = 'd_phone=' . $phone;
            $field = ['d_phone' => $phone, 'd_password' => $hashPass];
            $obj->update('donor', $field, $where);
            $values = $obj->getResult();
            if ($values) {
                $success = "Password reset successful. You can now login with your new password.";
                header("location:index.php");
            } else {
                $error = "Password reset failed.";
            }
        } else {
            $error = "Passwords do not match.";
        }
    } else {
        $error = "Invalid phone or birthdate.";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container {
            width: 400px;
            margin: 5% 0;
        }
        .cancel {
            background-color: red;
        }

        .cancel:hover {
            background-color: orangered;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Reset Password</h2>
        <form id="resetPasswordForm" method="post">
            <div class="form-group">
                <label for="resetDOB">Date of Birth:</label>
                <input type="date" id="resetDOB" name="resetDOB" required>
            </div>
            <div class="form-group">
                <label for="resetPhone">Phone:</label>
                <input type="tel" id="resetPhone" name="resetPhone" required>
            </div>
            <div class="form-group">
                <label for="resetpass">Enter New Password:</label>
                <input type="text" id="resetpass" name="newpass" required>
            </div>
            <div class="form-group">
                <label for="resetcon">confirm Password:</label>
                <input type="text" id="resetcon" name="conpass" required>
            </div>
            <div class="containers">
                <div class="form-group">
                    <button type="submit" name="submit">submit</button>
                </div>
            <div class="form-group">
                <button class="cancel" type="reset">cancel</button>
            </div>
            </div>
            <div class="containers">
                <div class="form-group">
                    <?php
                    if (isset($success)) {
                        echo "<p>@$success</p>";
                    } elseif (isset($error)) {
                        echo "<p>@$error</p>";
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</body>

</html>